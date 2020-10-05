<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Subkarakteristik;
use App\Karakteristik;

class AdminController extends Controller
{
    //
    public function index()
    {
        $data['karakteristik'] = Karakteristik::count();
        $data['subkarakteristik'] = Subkarakteristik::count();
        $data['admin'] = User::where('role','admin')->count();
        return view('/admin/home_admin',$data);
    }

    public function view_admin()
    {
        $data['users'] = User::where('role','admin')->get();
        return view('/admin/view_admin',$data);
    }

    public function editprofil()
	{
    	return view('/admin/edit_profil');
	}

    public function edit($id)
    {
        // mengambil data users berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        // passing data admin yang didapat ke view edit_profil.blade.php
        return view('/admin/edit_profil',['users' => $users]);
    }

	public function tambahadmin()
	{

		return view('/admin/tambahadmin');
	}

    public function tambahbobot()
    {
        $data['subkarakteristiks'] = Subkarakteristik::all();
        return view('/admin/tambahbobot',$data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    public function storeadmin(Request $request)
    {
        // insert data ke table users
        DB::table('users')->insert([
            'name' => $request->name,
            'role' => "admin",
            'instansi' => $request->instansi,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        // alihkan halaman ke halaman home admin
        return redirect('/admin/home');
    }

    public function update(Request $request, $id){
        $user = User::findorFail($id);
        
            $user->name       = $request->name;
            $user->instansi     = $request->instansi;
            $user->email  = $request->email;
           
  
        if ($user->save())
          return redirect()->route('adminview');
        else {
            return redirect()->route('adminview');
        }
    }
    public function delete($id){
        $data['users'] = User::all();
        $user = User::findOrFail($id)->delete();
        return redirect()->route('adminview');
    }

}

