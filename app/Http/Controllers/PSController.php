<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PSController extends Controller
{
    public function index($a_id)
    {
        return view('automatic');
    }

    public function loadtest()
    {
    	function curl() {
			$username = 'ulfatuzzahroh2@gmail.com'; // Pingdom username
			$password = '90est30est'; // Pingdom password
			$token    = 'Bearer TRG11avzEbCu6tA-VJYVgbRx3UGk42nacpoPyajPGUrJjfjJMvhR4qxW-NkG-C1IPKd7h4Is'; // Pingdom application key (32 characters)

			$pingdom = new \Pingdom\Client($username, $password, $token);

			// List of probe servers
			$probes = $pingdom->getProbes();
			foreach ($probes as $probe) {
			    echo $probe->getName() . PHP_EOL;
			}

			// List of checks
			$checks  = $pingdom->getChecks();
			foreach ($checks as $check) {
			    $results = $pingdom->getResults($check['id']);
			}
			return $results;
    		// $ch = curl_init(); 
		    // curl_setopt($ch, CURLOPT_URL, $url);
		    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		    // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer TRG11avzEbCu6tA-VJYVgbRx3UGk42nacpoPyajPGUrJjfjJMvhR4qxW-NkG-C1IPKd7h4I"));
		    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		    // $output = curl_exec($ch); 
		    // curl_close($ch);      
		    // echo $output;
		}
		// echo curl("https://api.pingdom.com/api/3.1/checks");
    }    
}

