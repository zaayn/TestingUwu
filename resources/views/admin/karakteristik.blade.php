@extends('layouts.app_admin')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Kelola Karakteristik</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/admin/karakteristik')}}"></i>Admin</a></li>
                  <li class="active">Karakteristik</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Daftar Karakteristik</h3></div>
          <div class="panel-body">
            <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>ID</th>
                  <th>Nama Karakteristik</th>
                  <th>Bobot Karakteristik</th>

                  <th>Aksi</th>
                </thead>
                <tbody>
                @foreach($karakteristiks as $karakteristik)
                <tr>
                  <td>{{ $karakteristik->k_id }}</td>
                  <td>{{ $karakteristik->k_nama }}</td>
                  <td>{{ $karakteristik->k_bobot }}</td>

                  <td>
                    <a href="{{route('edit.karakteristik',$karakteristik->k_id)}}" class="btn btn-info btn-sm">
                      <span class="fa fa-pencil"></span>
                    </a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" href="{{route('delete.karakteristik',$karakteristik->k_id)}}" class="btn btn-danger btn-sm">
                      <span class="fa fa-trash"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="{{asset('/admin/tambah_karakteristik')}}" class="btn btn-info btn-md">Tambah Karakteristik</a>
        </div>
      </div>
    </div>
</div>
@endsection


