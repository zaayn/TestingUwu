<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\SubKarakteristik;
use App\Karakteristik;

class EditTableAdminController extends Controller
{
    // edit table karakteristik
    public function edit_bobot_karakteristik_admin()
    {
        $data['no'] = 1;
        $data['karakteristiks'] = Karakteristik::where('a_id',1)->get();
        $data['total'] = Karakteristik::where('a_id',1)->sum('k_bobot');
        
        return view('/admin/tambahbobot',$data);
    }
    
    function action_edit_kar(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'k_bobot'       =>  $request->k_bobot
                );
                DB::table('karakteristik')
                    ->where('k_id', $request->k_id)
                    ->update($data);
            }
            if($request->action == 'delete')
            {
                DB::table('karakteristik')
                    ->where('k_id', $request->k_id)
                    ->delete();
            }
            return response()->json($request);
        }
    }

    // table edit subkarakteristik
    public function edit_sub_admin($k_id)
    {   
        $data['no'] = 1;
        $data['aplikasis'] = Karakteristik::where('k_id',$k_id)->get();
        $data['subkarakteristiks'] = Subkarakteristik::where('k_id',$k_id)->get();
        $data['total'] = Subkarakteristik::where('k_id',$k_id)->sum('bobot_relatif');

        return view('/admin/edit_bobot_sub_admin')->with($data);
    }

    function action_sub_admin(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'bobot_relatif'       =>  $request->bobot_relatif
                );
                DB::table('subkarakteristik')
                    ->where('sk_id', $request->sk_id)
                    ->update($data);
            }
            if($request->action == 'delete')
            {
                DB::table('subkarakteristik')
                    ->where('sk_id', $request->sk_id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
