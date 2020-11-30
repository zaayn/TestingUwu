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

class AplikasiController extends Controller
{
    public function index()
    {
        $data['aplikasis'] = Aplikasi::all();
        return view('/aplikasi',$data);
    }
    public function nilai($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        // $data['karakteristiks'] = Karakteristik::all();
        // return $a_id;
        // $data['subkarakteristiks'] = Subkarakteristik::whereHas('karakteristik', function($query){
        //     $query->where('a_id', $a_id);
        // })->get();
        $data['subkarakteristiks'] = DB::table('subkarakteristik')
        ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
        ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
        ->where('aplikasi.a_id',$a_id)->get();
        
        return view('/nilai_app',$data);
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
        $apps = Aplikasi::all()->count();
        $karakteristik = Karakteristik::all()->count();
        $karakteristik+=1;

        $subkarakteristik = Subkarakteristik::all()->count();
        $subkarakteristik+=1;

        $aplikasi = new aplikasi;
        $aplikasi->a_id      = $apps+1;
        $aplikasi->id        = Auth::user()->id;
        $aplikasi->a_nama    = $request->a_nama;
        $aplikasi->a_url     = $request->a_url;
        $aplikasi->a_total   = 0;
        $aplikasi->save();

        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Functional Suitability', 0.21, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Performance Efficiency', 0.24, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Compatibility', 0.05, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Usability', 0.12, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Reliability', 0.08, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Security', 0.20, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Maintainability', 0.05, 0]);
        DB::insert('insert into karakteristik (k_id, a_id, k_nama, k_bobot, nilai) values(?,?,?,?,?)',
        [$karakteristik++, $aplikasi->a_id,'Portability', 0.05, 0]);

        $no1 = $karakteristik-8;
        $no2 = $karakteristik-7;
        $no3 = $karakteristik-6;
        $no4 = $karakteristik-5;
        $no5 = $karakteristik-4;
        $no6 = $karakteristik-3;
        $no7 = $karakteristik-2;
        $no8 = $karakteristik-1;

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no1,'Functional Completeness',0.37,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no1,'Functional Correctness',0.32,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no1,'Functional Appropriateness',0.31,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no2,'Time Behaviour',0.40,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no2,'Resource Utilization',0.20,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no2,'Capacity',0.40,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no3,'Co-Existence',0.45,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no3,'Interoperability',0.55,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no4,'Appropriateness Recognizability',0.19,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no4,'Learnability',0.15,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no4,'Operability',0.22,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no4,'User Error Protection',0.16,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no4,'User Interface Aesthetics',0.08,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no4,'Accessibility',0.20,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no5,'Maturity',0.20,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no5,'Availability',0.25,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no5,'Fault-Tolerance',0.30,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no5,'Recoverability',0.25,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no6,'Confidentiality',0.15,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no6,'Integrity',0.25,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no6,'Non-repudiation',0.15,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no6,'Authenticity',0.25,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no6,'Accountability',0.20,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no7,'Modularity',0.15,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no7,'Reusability',0.25,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no7,'Analysability',0.15,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no7,'Modifiability',0.25,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no7,'Testability',0.20,0, 0, 0, 0, 0]);

        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no8,'Adaptability',0.32,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no8,'Installability',0.27,0, 0, 0, 0, 0]);
        DB::insert('insert into subkarakteristik (sk_id, k_id, sk_nama, bobot_relatif, ps_nilai, jumlah_responden, bobot_absolut, nilai_subfaktor, nilai_absolut) values(?,?,?,?,?,?,?,?,?)',
        [$subkarakteristik++, $no8,'Replaceability',0.41,0, 0, 0, 0, 0]);
        
        
        return redirect('/softwaretester/aplikasi')->with('success', 'item berhasil ditambahkan');
      
    }

    public function delete($a_id){
        $aplikasi = Aplikasi::findOrFail($a_id)->delete();
        return redirect()->route('index.aplikasi');
    }
}
