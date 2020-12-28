@include('layouts.includes.admin_header')
@include('layouts.includes.admin_leftmenu')
@section('content')

<div id="content">
  <div class="panel box-shadow-none content-header">
     <div class="panel-body">
       <div class="col-md-12">
           <h3 class="animated fadeInLeft">Kelola Software Tester</h3>
           <p class="animated fadeInDown">
            Home <span class="fa-angle-right fa"></span> Kelola Software Tester
        </p>
      </div>
    </div>
  </div>

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



