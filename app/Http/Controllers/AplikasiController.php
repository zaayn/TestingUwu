<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aplikasi;
use App\Karakteristik;
use App\SubKarakteristik;
use File;
use PDF;

class AplikasiController extends Controller
{
    //TAMPILIN HALAMAN APLIKASI
    public function index()
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('id',Auth::user()->id)->get();
        return view('/aplikasi',$data);
    }
    //TAMPILIN HALAMAN PENGUKURAN / NILAI
    public function nilai($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $subkarakteristiks = DB::table('subkarakteristik')
                                    ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
                                    ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
                                    ->where('aplikasi.a_id',$a_id)->get();      
        $rowspan = [];
        foreach ($subkarakteristiks as $key => $value)
            if(!@$rowspan[$value->k_nama])
                $rowspan[$value->k_nama] = 1;
            else
                $rowspan[$value->k_nama]++;

        $data['subkarakteristiks'] = $subkarakteristiks;
        $data['rowspan'] = $rowspan;
        return view('/nilai_app', $data);
    }
    //TAMPILIN HALAMAN TAMBAH APLIKASI
    public function insert()
    {
        $data['no'] = 1;
        $subkarakteristiks = DB::table('subkarakteristik')
        ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
        ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
        ->where('aplikasi.a_id',1)->get();
        
        $rowspan = [];
        foreach ($subkarakteristiks as $key => $value)
            if(!@$rowspan[$value->k_nama])
                $rowspan[$value->k_nama] = 1;
            else
                $rowspan[$value->k_nama]++;

        $data['subkarakteristiks'] = $subkarakteristiks;
        $data['rowspan'] = $rowspan;

        return view('/tambah_aplikasi', $data);
    }
    // EDIT APLIKASI
    public function edit($a_id)
    {
        $aplikasi = Aplikasi::findOrFail($a_id);
        return view('/edit_aplikasi')->with('aplikasi', $aplikasi);
    }
    //UPDATE / SAVE SETELAH EDIT APLIKASI
    public function update(Request $request, $a_id){
        $aplikasi = Aplikasi::findorFail($a_id);
        $this->validate($request,[
            'a_nama'      =>['required'],
        ]);
        $aplikasi->a_nama       = $request->a_nama;
        if ($aplikasi->save())
          return redirect()->route('index.aplikasi');
    }
    //SIMPAN DATA APLIKASI SETELAH NAMBAH
    public function store(Request $request)
    {
        $file = $request->file('a_file');    
        $aplikasi = new aplikasi;
        $this->validate($request,[
            'a_nama' => 'required',
            'a_url' =>  'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'a_file' => 'required',
            'radios' => 'required'
        ]
        ,$messages = [
            'regex'   => 'you have to enter the right url format'
        ]);

        $aplikasi->id        = Auth::user()->id;
        $aplikasi->a_nama    = $request->a_nama;
        $aplikasi->a_url     = $request->a_url;
        $aplikasi->a_file    = $file->getClientOriginalName();
        $aplikasi->a_nilai   = 0;

        // Check the extension of file, only php extension is allowed to upload 
        $extension = $file->getClientOriginalExtension();
        $allowed_extension = 'php';

        if ($extension==$allowed_extension){
        $aplikasi->save();     
        } else {
           return redirect()->route('insert.aplikasi')->with('error', 'you have to choose file with .php extension');
        };
        
        //Make folder named by id aplikasi and store the file uploaded in the folder 
        $idpath = $aplikasi->a_id;
        File::makeDirectory($idpath, $mode = 0777, true, true);
        $file->move($idpath,$file->getClientOriginalName());
        
        //tambah bobot patokan ke aplikasi yang dibuat
        $kar = Karakteristik::where('a_id', 1)->get();
        $sub = DB::table('subkarakteristik')
        ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
        ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
        ->where('aplikasi.a_id',1)->get();
        
        foreach ($kar as $k) {
            DB::table('karakteristik')->insert([
            ['a_id' => $aplikasi->a_id, 
             'k_nama' => $k->k_nama,
             'k_bobot' => $k->k_bobot,
             'k_nilai' => 0
            ],
            ]);
        }

        $kar2 = Karakteristik::where('a_id', $aplikasi->a_id)->get();

        foreach ($kar2 as $k2) {
            foreach ($sub as $s) {
                if ($s->k_nama == $k2->k_nama) {
                    DB::table('subkarakteristik')->insert([
                    ['k_id' => $k2->k_id, 
                     'sk_nama' => $s->sk_nama,
                     'bobot_relatif' => $s->bobot_relatif,
                     'bobot_absolut' => 0,
                     'nilai_subfaktor' => 0,
                     'nilai_absolut' => 0,
                     'jml_res' => 0,
                     'total_per_sub' => 0
                    ],
                    ]);
                }
            }   
        }
        
        
        if ($request->radios == "patokan") {
            return redirect()->route('nilai', $aplikasi->a_id);
        }
        else{
            return redirect()->route('custom.kar', $aplikasi->a_id);
        }
    }

    //HAPUS APLIKASI
    public function delete($a_id){
        $aplikasi = Aplikasi::findOrFail($a_id);
        $apps_id = $aplikasi->a_id;
        
        $path = public_path()."/".$apps_id."/";
        File::deleteDirectory($path);

        $aplikasi->delete($apps_id);

        return redirect()->route('index.aplikasi');
    }

    //SHOW HASIL
    public function hasil($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $subkarakteristiks = DB::table('subkarakteristik')
                                    ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
                                    ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
                                    ->where('karakteristik.k_nama','=','maintainability')
                                    ->where('aplikasi.a_id',$a_id)->get(); 
           
        $rowspan = [];
        foreach ($subkarakteristiks as $key => $value)
            if(!@$rowspan[$value->k_nama])
                $rowspan[$value->k_nama] = 1;
            else
                $rowspan[$value->k_nama]++;

        $data['subkarakteristiks'] = $subkarakteristiks;
        $data['rowspan'] = $rowspan;      
        return view('/hasil_ukur', $data);
    }

    //CETAK PDF
    public function cetak_pdf($a_id)
    {
        // set_time_limit(300);
        // $data['no'] = 1;
        // $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        // $subkarakteristiks = DB::table('subkarakteristik')
        //                             ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
        //                             ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
        //                             ->where('aplikasi.a_id',$a_id)->get();      
        // $rowspan = [];
        // foreach ($subkarakteristiks as $key => $value)
        //     if(!@$rowspan[$value->k_nama])
        //         $rowspan[$value->k_nama] = 1;
        //     else
        //         $rowspan[$value->k_nama]++;

        // $data['subkarakteristiks'] = $subkarakteristiks;
        // $data['rowspan'] = $rowspan;      
        // return view('/hasil_ukur', $data);

        // $pdf = PDF::loadView('pdf', $data);  
        // return $pdf->download('laporan_pengukuran.pdf');
        // return $pdf->stream();
    }
}
