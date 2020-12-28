<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return view('/home');
    }

    public function edit($id)
    {
        // mengambil data users berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        // passing data users yang didapat ke view edit_profil.blade.php
        return view('/edit_profil',['users' => $users]);
    }

    public function update(Request $request)
    {
        // update data users
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'instansi' => $request->instansi,
            'email' => $request->email
        ]);
        // alihkan halaman ke halaman home users
        return view('/softwaretester/home');
    }

}
