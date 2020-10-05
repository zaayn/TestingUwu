@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

<div id="content">
  <div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Daftar Aplikasi</h1>
                <ol class="breadcrumb">
                    <li><a href="{{asset('/softwaretester/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Aplikasi</li>
                </ol>
            </div>
        </div>
    </div>
  </div>

  <div class="col-md-12 top-20 padding-0">
      <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
              @include('admin.shared.components.alert')
              <div class="responsive-table">
                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <th style="width: 5%">ID</th>
                    <th style="width: 25%">Nama User</th>
                    <th style="width: 30%">Nama Aplikasi</th>
                    <th style="width: 10%">Uji Aplikasi</th>
                    <th style="width: 15%">Automatic Testing</th>
                    <th style="width: 15%">Aksi</th>
                  </thead>
                  <tbody>
                  @foreach($aplikasis as $aplikasi)
                  <tr>
                    <td>{{ $aplikasi->a_id }}</td>
                    <td>{{ $aplikasi->user->name }}</td>
                    <td>{{ $aplikasi->a_nama }}</td>

                    <td>
                      <a href="{{route('nilai',$aplikasi->a_id)}}" class="btn btn-info btn-sm">
                        <span class="fa fa-pencil"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{route('automatic',$aplikasi->a_id)}}" class="btn btn-info btn-sm">
                        <span class="fa fa-pencil"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{route('edit.aplikasi',$aplikasi->a_id)}}" class="btn btn-info btn-sm">
                        <span class="fa fa-pencil"></span>
                      </a>
                      <a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" href="{{route('delete.aplikasi',$aplikasi->a_id)}}" class="btn btn-danger btn-sm">
                        <span class="fa fa-trash"></span>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <a href="{{asset('softwaretester/insert_aplikasi')}}" class="btn btn-info btn-md">Tambah Aplikasi</a>
          </div>
        </div>
      </div>
  </div>
</div>
@section('js')
<script>  
$(document).ready(function() {
  $(document).ready( function () {
    $('#mydatatables').DataTable();
  });
})
</script>
@endsection


