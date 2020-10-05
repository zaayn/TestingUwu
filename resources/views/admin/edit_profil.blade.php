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
           <h3 class="animated fadeInLeft">Kelola Admin</h3>
           <p class="animated fadeInDown">
            Home <span class="fa-angle-right fa"></span> Admin <span class="fa-angle-right fa"></span> Kelola Admin
        </p>
      </div>
    </div>
  </div>

 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Tambah Admin</h3></div>
          <div class="panel-body">
            @foreach($users as $u)
            <form action="{{route('update.user', $u->id)}}" method="post">
                {{ csrf_field() }} 
                <div class="form-group">
                  <label>Nama :</label>
                  <div><input id="name" type="text" class="form-control" name="name" value="{{ $u->name }}" required autofocus></div>
                </div>
                <div class="form-group">
                  <label>Instansi :</label>
                  <div><input id="instansi" type="text" class="form-control" name="instansi" value="{{ $u->instansi }}" required></div>
				</div>
				<div class="form-group">
                  <label>Email :</label>
                  <div><input id="email" type="email" class="form-control" name="email" value="{{ $u->email }}" required></div>
				</div>

                

                <button type="submit" class="btn btn-primary ">Submit</button>
                <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/superadmin/user')}}" class="btn btn-secondary"> Cancel</a>
            </form>
            @endforeach
            

        </div>
      </div>
    </div>
</div>