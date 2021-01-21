<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Karakteristik;
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

    public function edit($k_id)
    {
        $karakteristik = Karakteristik::findOrFail($k_id);
        return view('/admin/edit_karakteristik')->with('karakteristik', $karakteristik);
    }

    public function update(Request $request, $k_id){
        $karakteristik = Karakteristik::findorFail($k_id);
        $this->validate($request,[
            'k_nama'       =>['required'],
            'k_bobot'      =>['required'],
        ]);

        $karakteristik->k_nama        = $request->k_nama;
        $karakteristik->k_bobot       = $request->k_bobot;
            
        if ($karakteristik->save())
          return redirect()->route('index.karakteristik');
    }

    public function delete($k_id){
        $karakteristik = Karakteristik::findOrFail($k_id)->delete();
        return redirect()->route('index.karakteristik');
    }

    public function customkar($a_id)
    {
        $data['no'] = 1;
        $data['id_aplikasi'] = $a_id;
        $data['karakteristiks'] = Karakteristik::where('a_id',$a_id)->get();
        $data['total'] = DB::table('karakteristik')->where('a_id','=',$a_id)->sum('k_bobot');
        return view('/custom_kar', $data);
    }

    function actionkar(Request $request)
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
    
    public function viewkar($a_id)
    {
        $data['no'] = 1;
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $data['karakteristiks'] = Karakteristik::where('a_id',$a_id)->get();
        return view('/custom_kar', $data);
    }
    
    public function editbobotkar($a_id)
    {
        $data['total'] = DB::table('karakteristik')->where('a_id','=',$a_id)->sum('k_bobot');
        $data['aplikasis'] = Aplikasi::where('a_id',$a_id)->get();
        $data['karakteristiks'] = Karakteristik::where('a_id',$a_id)->get();
        return view('/edit_bobotkar', $data);
    }

    public function storebobotkar(Request $request, $k_id)
    {
        $karakteristik = Karakteristik::findorFail($k_id);

        $karakteristik->k_bobot      = $request->k_bobot;
        if ($karakteristik->save()) {
          return redirect()->route('custom.kar', $karakteristik->aplikasi->a_id)->with('success', 'item berhasil diubah');
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

        public function bobot()
    {
        $data['no'] = 1;
        $subkarakteristiks = DB::table('subkarakteristik')
        ->join('karakteristik', 'karakteristik.k_id', '=', 'subkarakteristik.k_id')
        ->join('aplikasi','aplikasi.a_id','=','karakteristik.a_id')
        ->where('aplikasi.a_id',1)->get();

        $rowspan = [];
        foreach ($subkarakteristiks as $key => $value)
            if(!@$rowspan[$value->k_nama])
                $rowspan[$value->k_nama] = 1;
            else
                $rowspan[$value->k_nama]++;

        $data['subkarakteristiks'] = $subkarakteristiks;
        $data['rowspan'] = $rowspan;

        return view('/bobot',$data);
    }

}
