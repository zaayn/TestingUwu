@extends('layouts.app_admin')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Kelola Admin</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/admin/adminview')}}"></i>Admin</a></li>
                  <li class="active">Kelola Admin</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-body">
          <a href="{{asset('/admin/tambahadmin')}}" class="btn btn-info btn-md">Tambah Admin</a>
          <hr>
            <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Instansi</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->role }}</td>
                  <td>{{ $user->instansi }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <a href="/admin/profil/{{ $user->id }}" class="btn btn-info btn-sm">
                      <span class="fa fa-pencil"></span>
                    </a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" href="{{route('delete.user',$user->id)}}" class="btn btn-danger btn-sm">
                      <span class="fa fa-trash"></span>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


