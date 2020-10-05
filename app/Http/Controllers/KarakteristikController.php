<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Karakteristik;

class KarakteristikController extends Controller
{
    public function index()
    {
        $data['karakteristiks'] = Karakteristik::all();
        return view('/admin/karakteristik',$data);
    }
    public function insert()
    {
        return view('/admin/tambah_karakteristik');
    }
    public function store(Request $request)
    {

      $karakteristik = new karakteristik;
      $karakteristik->k_id      = $request->k_id;
      $karakteristik->k_nama    = $request->k_nama;
      $karakteristik->k_bobot   = $request->k_bobot;

      if ($karakteristik->save()){
        return redirect('/admin/karakteristik');
      }
      else{
        return redirect('/admin/tambah_karakteristik');
      }
    }
    public function delete($k_id){
        $karakteristik = Karakteristik::findOrFail($k_id)->delete();
        return redirect()->route('index.karakteristik');
    }

}
