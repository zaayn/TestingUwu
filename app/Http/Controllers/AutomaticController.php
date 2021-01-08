<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Karakteristik;
use App\SubKarakteristik;
use App\Aplikasi;

class AutomaticController extends Controller
{
    public function capacity(Request $request, $sk_id){
        $subkarakteristik = SubKarakteristik::findOrFail($sk_id);
        $url = $subkarakteristik->karakteristik->aplikasi->a_url;

        $temp = 0;
        for($i=0;$i<81;$i++){
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
            } else {
                $json = json_encode(['health' => $health, 'status' => '0']);
            }
            
        }

        $hasil = ceil($temp/20);

        $subkarakteristik->nilai_subfaktor = $hasil;
        $subkarakteristik->bobot_absolut 	= $subkarakteristik->karakteristik->k_bobot * $subkarakteristik->bobot_relatif;
        $subkarakteristik->nilai_absolut 	= $subkarakteristik->bobot_absolut * $subkarakteristik->nilai_subfaktor;
        $subkarakteristik->save();
        return redirect()->back();
    }
}
