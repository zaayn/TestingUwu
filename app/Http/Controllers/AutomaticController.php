<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SubKarakteristik;
use App\Karakteristik;

class AutomaticController extends Controller
{
    public function capacity2(Request $request, $sk_id){
        $subkarakteristik = SubKarakteristik::findOrFail($sk_id);
        $url = $subkarakteristik->karakteristik->aplikasi->a_url;

        $test = public_path()."/python";
        system("cd $test && py ping_statuscode.py");
        
    }
    public function capacity(Request $request, $sk_id)
    {    
        $subkarakteristik = SubKarakteristik::findOrFail($sk_id);
        $url = $subkarakteristik->karakteristik->aplikasi->a_url;

        //array of cURL handles
        $chs = array();
        $temp = 0;

      //create the array of cURL handles and add to a multi_curl
        $mh = curl_multi_init();
        // foreach ($urls as $key => $url) 
        for ($key=0;$key<100;$key++){
            $chs[$key] = curl_init($url);
            curl_setopt($chs[$key], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chs[$key], CURLOPT_POST, true);
            // curl_setopt($chs[$key], CURLOPT_POSTFIELDS, $request_contents[$key]);

            curl_multi_add_handle($mh, $chs[$key]);
        }

        //running the requests
        $running = null;
        do {
        curl_multi_exec($mh, $running);
        } while ($running);

        //getting the responses
        foreach(array_keys($chs) as $key){
            $error = curl_error($chs[$key]);
            $last_effective_URL = curl_getinfo($chs[$key], CURLINFO_EFFECTIVE_URL);
            $time = curl_getinfo($chs[$key], CURLINFO_TOTAL_TIME);
            $response = curl_multi_getcontent($chs[$key]);  // get results
            if (!empty($error)) {
            echo "The request $key return a error: $error" . "\n";
            }
            else {
                $temp += 1;
                // echo "The request to '$last_effective_URL' returned '$response' in $time seconds." . "\n";
            }

            curl_multi_remove_handle($mh, $chs[$key]);
        }
        
        // close current handler
        curl_multi_close($mh);
        $subkarakteristik->nilai_subfaktor = $temp;
        $subkarakteristik->bobot_absolut 	= $subkarakteristik->karakteristik->k_bobot * $subkarakteristik->bobot_relatif;
        $subkarakteristik->nilai_absolut 	= $subkarakteristik->bobot_absolut * $subkarakteristik->nilai_subfaktor;
        
        $karakteristik = Karakteristik::findOrFail($subkarakteristik->karakteristik->k_id);
        $karakteristik->k_nilai     += $subkarakteristik->nilai_absolut;

        if ($subkarakteristik->save() && $karakteristik->save()) {
        	return redirect()->route('nilai', $subkarakteristik->karakteristik->aplikasi->a_id)->with('success', 'Url berhasil direquest');
        }
        else {
            return redirect()->route('nilai', $subkarakteristik->karakteristik->aplikasi->a_id)->with('error', 'Url gagal direquest');
        }

    }
}