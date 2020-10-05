<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PKController extends Controller
{
    public function insert()
    {
        return view('/tambah_pk');
    }

    public function store(Request $request)
    {
      $aplikasi = new aplikasi;
      $aplikasi->a_id      = $request->a_id;
      $aplikasi->id        = Auth::user()->id;
      $aplikasi->a_nama    = $request->a_nama;  
      $aplikasi->a_total   = 0;

      if ($aplikasi->save()){
        return redirect('/aplikasi');
      }
      else{
        return redirect('/tambah_aplikasi');
      }
    }

}
