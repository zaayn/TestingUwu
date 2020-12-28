@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

<div id="content">
  <div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Custom Karakteristik</h1>
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
            <div class="panel-heading">
                <h3>
                    @foreach ($aplikasis as $aplikasi)
                    {{ $aplikasi->a_nama }}
                    @endforeach
                </h3>
            </div>
            <div class="panel-body">
              @include('admin.shared.components.alert')
              <div class="responsive-table">
                <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <th style="width: 5%">ID</th>
                    <th style="width: 30%">Nama Karakteristik</th>
                    <th style="width: 25%">Bobot Karakteristik</th>
                    <th style="width: 20%">Edit Bobot</th>
                    <th style="width: 20%">Custom Subkarakteristik</th>
                  </thead>
                  <tbody>
                  @foreach($karakteristiks as $k)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $k->k_nama }}</td>
                    <td>{{ $k->k_bobot }}</td>
                    <td>
                        <a href="{{route('edit.kar',$k->k_id)}}" class="btn btn-info btn-sm">
                        <span class="fa fa-pencil"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('custom.sub',$k->k_id)}}" class="btn btn-info btn-sm">
                        <span class="fa fa-pencil"></span>
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


