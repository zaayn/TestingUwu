<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Karakteristik;
use App\SubKarakteristik;
use App\Aplikasi;

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

    public function customkar($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $data['karakteristiks'] = Karakteristik::where('a_id',$a_id)->get();

        $data['total'] = DB::table('karakteristik')->where('a_id','=',$a_id)->sum('k_bobot');
        return view('/edit_bobotkar', $data);
    }
    public function viewkar($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $data['karakteristiks'] = Karakteristik::where('a_id',$a_id)->get();
        return view('/custom_kar', $data);
    }

    public function editbobotkar($k_id)
    {
        $karakteristiks = Karakteristik::where('k_id',$k_id)->get();
        return view('/edit_bobotkar', ['karakteristiks' => $karakteristiks]);
    }

    public function storebobotkar(Request $request, $k_id)
    {
        $karakteristik = Karakteristik::findorFail($k_id);

        $karakteristik->k_bobot      = $request->k_bobot;
        
        // $aplikasi = Aplikasi::findorFail($karakteristik->aplikasi->a_id);
        
        
        if ($karakteristik->save()) {
          return redirect()->route('custom.kar', $karakteristik->aplikasi->a_id);
        }    
    }

    public function store(Request $request)
    {

      $karakteristik = new karakteristik;
      $karakteristik->k_id      = $request->k_id;
      $karakteristik->a_id      = 1;
      $karakteristik->k_nama    = $request->k_nama;
      $karakteristik->k_bobot   = $request->k_bobot;
      $karakteristik->k_nilai   = 0;

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

        public function bobot()
    {
        $data['karakteristiks'] = Karakteristik::all();
        return view('/bobot',$data);
    }

}
