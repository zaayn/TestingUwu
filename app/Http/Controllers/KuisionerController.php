<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Kuisioner;
use App\Aplikasi;
use App\Karakteristik;
use App\Subkarakteristik;

class KuisionerController extends Controller
{
    public function kuis($sk_id)
    {
        $data['subkarakteristiks'] = Subkarakteristik::where('sk_id',$sk_id)->get();
        
        return view('/kuisioner',$data);
    }
    public function update(Request $request, $sk_id)
    {
        $subkarakteristik   =   SubKarakteristik::findorFail($sk_id);
        
        $subkarakteristik->ps_nilai             = $request->ps_nilai;
        $subkarakteristik->jumlah_responden     = $request->jumlah_responden;
        $subkarakteristik->bobot_absolut        = $subkarakteristik->karakteristik->k_bobot * $subkarakteristik->bobot_relatif;
        $subkarakteristik->nilai_subfaktor      = $subkarakteristik->ps_nilai / $subkarakteristik->jumlah_responden;
        $subkarakteristik->nilai_absolut        = $subkarakteristik->bobot_absolut * $subkarakteristik->nilai_subfaktor;
        

        if ($subkarakteristik->save())
          return redirect()->route('nilai',$subkarakteristik->karakteristik->aplikasi->a_id)->with('success', 'item berhasil diupdate');
    }
}
