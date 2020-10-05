<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Subkarakteristik;

class SubkarakteristikController extends Controller
{
    public function edit($sk_id)
    {
        $subkarakteristik = Subkarakteristik::findOrFail($sk_id);
        return view('/admin/edit_sub')->with('subkarakteristik', $subkarakteristik);
    }
   
    public function update(Request $request, $id){
        $subkarakteristik = Subkarakteristik::findorFail($id);
        $this->validate($request,[
            'bobot_relatif'      =>['required'],
        ]);
        $subkarakteristik->bobot_relatif       = $request->bobot_relatif;
            
  
        if ($subkarakteristik->save())
          return redirect()->route('tambahbobot');
    }
}
