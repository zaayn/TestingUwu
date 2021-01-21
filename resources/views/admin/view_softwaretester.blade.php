@extends('layouts.app_admin')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Software Tester</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/admin/softwaretesterview')}}"></i>Admin</a></li>
                  <li class="active">Software Tester</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Daftar Software Tester</h3></div>
          <div class="panel-body">
            <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Instansi</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $loop->iteration  }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->instansi }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- <a href="{{asset('/admin/tambahadmin')}}" class="btn btn-info btn-md">Tambah Admin</a> -->
        </div>
      </div>
    </div>
</div>
@endsection


