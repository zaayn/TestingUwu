@extends('layouts.app_softwaretester')

@section('content_header')
  <div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Edit Aplikasi</h1>
                <ol class="breadcrumb">
                    <li><a href="{{asset('/softwaretester/home')}}"></i> Home</a></li>
                    <li><a href="{{asset('/softwaretester/aplikasi')}}"></i> Aplikasi</a></li>
                    <li class="active">Edit Aplikasi</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Aplikasi</h3></div>
          <div class="panel-body">
            <form action="{{route('update.aplikasi', $aplikasi->a_id)}}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Aplikasi :</label>
                        <div>
                          <input type="text" class="form-control" name="a_nama" value="{{ $aplikasi->a_nama}}"required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ">Update</button>
                    <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{asset('/softwaretester/aplikasi')}}" class="btn btn-secondary"> Cancel</a>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection



