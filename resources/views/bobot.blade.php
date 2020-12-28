@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

<div id="content">
  <div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Bobot Karakteristik</h1>
                <ol class="breadcrumb">
                    <li><a href="{{asset('/softwaretester/home')}}">Home</a></li>
                    <li class="active">Bobot Karakteristik</li>
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
                    <th style="width: 35%">Nama Karakteristik</th>
                    <th style="width: 30%">Bobot Karakteristik</th>
                    <th style="width: 15%">Sub Karakteristik</th>
                  </thead>
                  <tbody>
                  @foreach($karakteristiks as $karakteristik)
                  <tr>
                    <td>{{ $karakteristik->k_id }}</td>
                    <td>{{ $karakteristik->k_nama }}</td>
                    <td>{{ $karakteristik->k_bobot }}</td>
                    <td>
                    <a href="{{route('view.bobotsub',$karakteristik->k_id)}}" class="btn btn-info btn-sm">
                        <span class="fa fa-location-arrow"></span>
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
    