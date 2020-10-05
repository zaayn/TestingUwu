@include('layouts.includes.admin_header')
@include('layouts.includes.admin_leftmenu')
@section('tabeladmin')

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-left: 10%;
  margin-bottom: 105px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5DADE2;
  color: white;
}

</style>

<div id="content">
  <div class="panel box-shadow-none content-header">
     <div class="panel-body">
       <div class="col-md-12">
           <h3 class="animated fadeInLeft">Edit Bobot Relatif</h3>
           <p class="animated fadeInDown">
            Home <span class="fa-angle-right fa"></span> Bobot Relatif <span class="fa-angle-right fa"></span>Edit Bobot Relatif
        </p>
      </div>
    </div>
  </div>

 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Daftar Admin</h3></div>
          <div class="panel-body">
            
            <form action="{{route('update.sub', $subkarakteristik->sk_id)}}" method="POST">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label>Bobot Relatif Baru :</label>
                        <div>
                          <input type="text" class="form-control" name="bobot_relatif" value="{{ $subkarakteristik->bobot_relatif}}"required>
                        </div>
                    </div>
                

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{asset('/superadmin/user')}}" class="btn btn-secondary"> Cancel</a>
            </form>

        </div>
      </div>
    </div>
</div>



