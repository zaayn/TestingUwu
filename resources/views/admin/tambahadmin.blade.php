@extends('layouts.app_admin')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Kelola Admin</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/admin/tambahadmin')}}"></i>Admin</a></li>
                  <li class="active">Tambah Admin</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Tambah Admin</h3></div>
          <div class="panel-body">

            <form action="/admin/storeadmin" method="post">
                {{ csrf_field() }} 
                <div class="form-group">
                  <label>Nama :</label>
                  <div><input type="text" class="form-control"  name="name" required></div>
                </div>
                <div class="form-group">
                  <label>Instansi :</label>
                  <div><input type="text" class="form-control"  name="instansi" required></div>
				</div>
				<div class="form-group">
                  <label>Email :</label>
                  <div><input type="text" class="form-control"  name="email" required></div>
				</div>
				<div class="form-group">
                  <label>Password :</label>
                  <div><input type="password" class="form-control"  name="password" required></div>
				</div>
                

                <button type="submit" class="btn btn-primary ">Submit</button>
                <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/superadmin/user')}}" class="btn btn-secondary"> Cancel</a>
            </form>
            

        </div>
      </div>
    </div>
</div>
@endsection


