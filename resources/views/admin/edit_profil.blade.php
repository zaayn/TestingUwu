@extends('layouts.app_admin')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Profil</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/admin/home')}}"></i> Home</a></li>
                  <li class="active">Profil</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Edit Profil</h3></div>
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
@endsection