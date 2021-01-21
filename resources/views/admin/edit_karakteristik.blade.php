@extends('layouts.app_admin')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Edit Karakteristik</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/admin/edit_karakteristik')}}"></i>Admin</a></li>
                  <li class="active">Edit Karakteristik</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Edit Karakteristik</h3></div>
          <div class="panel-body">
      
            <form action="{{route('update.karakteristik', $karakteristik->k_id)}}" method="POST">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nama Karakteristik :</label>
                        <div>
                          <input type="text" class="form-control" name="k_nama" value="{{ $karakteristik->k_nama}}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Bobot Karakteristik Baru :</label>
                        <div>
                          <input type="text" class="form-control" name="k_bobot" value="{{ $karakteristik->k_bobot}}" required>
                        </div>
                    </div>
                

                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{asset('/superadmin/user')}}" class="btn btn-secondary"> Cancel</a>
            </form>

        </div>
      </div>
    </div>
</div>
@endsection



