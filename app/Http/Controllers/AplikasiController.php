<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Aplikasi;
use App\Karakteristik;
use App\Subkarakteristik;
use App\PenilaianKarakteristik;
use App\PenilaianSubKarakteristik;
use Illuminate\Support\Facades\Storage;

class AplikasiController extends Controller
{
    public function index()
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('id',Auth::user()->id)->get();
        return view('/aplikasi',$data);
    }
    public function nilai($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $data['subkarakteristiks'] = DB::table('subkarakteristik')
                                    ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
                                    ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
                                    ->where('aplikasi.a_id',$a_id)->get();
        return view('/nilai_app', $data);
    }

    public function insert()
    {
        return view('/tambah_aplikasi');
    }

    public function edit($a_id)
    {
        $aplikasi = Aplikasi::findOrFail($a_id);
        return view('/edit_aplikasi')->with('aplikasi', $aplikasi);
    }

    public function update(Request $request, $a_id){
        $aplikasi = Aplikasi::findorFail($a_id);
        $this->validate($request,[
            'a_nama'      =>['required'],
        ]);
        $aplikasi->a_nama       = $request->a_nama;
            
  
        if ($aplikasi->save())
          return redirect()->route('index.aplikasi');
    }

    public function store(Request $request)
    {
        $file = $request->file('a_file');
        
        $file->move(public_path()."/file/",$file->getClientOriginalName()); 

        $aplikasi = new aplikasi;

        $aplikasi->id        = Auth::user()->id;
        $aplikasi->a_nama    = $request->a_nama;
        $aplikasi->a_url     = $request->a_url;
        $aplikasi->a_file    = $file->getClientOriginalName();
        $aplikasi->a_nilai   = 0;
        $aplikasi->save();        

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
        
        return redirect()->route('custom.kar', $aplikasi->a_id);
    }

    public function delete($a_id){
        $aplikasi = Aplikasi::findOrFail($a_id)->delete();
        return redirect()->route('index.aplikasi');
    }
}
