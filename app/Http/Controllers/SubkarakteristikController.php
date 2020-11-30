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

    public function capacity(Request $request, $sk_id){
        $subkarakteristik = Subkarakteristik::findOrFail($sk_id);
        $ip = $subkarakteristik->karakteristik->aplikasi->a_url;

        $url = $ip;
        $temp = 0;
        for($i=0;$i<5;$i++){
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            
            $health = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($health) {
                $json = json_encode(['health' => $health, 'status' => '1']);
                $temp+=1;
                // print($json);
            } else {
                $json = json_encode(['health' => $health, 'status' => '0']);
                // print($json);
            }
            
        }

        if ($temp > 0 && $temp <= 20){
            $hasil = 1;    
        } 
        else {
            $hasil = 0;
        }
        $subkarakteristik->nilai_subfaktor = $hasil;
        $subkarakteristik->save();
        return redirect()->back();
    }
}
