@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

<div id="content">
  <div class="row"> 
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Bobot Sub Karakteristik</h1>
                <ol class="breadcrumb">
                    <li><a href="{{asset('/softwaretester/home')}}">Home</a></li>
                    <li><a href="{{asset('/softwaretester/bobot')}}">Bobot Karakteristik</a></li>

                    <li> @foreach ($karakteristiks as $karakteristik)
                      {{ $karakteristik->k_nama }}
                    @endforeach
                    </li>
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
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Sub Karakteristik</th>
                    <th>Bobot Sub Karakteristik</th>
                  </tr>
                </thead>
                <tbody>
              
                  @foreach($subkarakteristiks as $sk)
                  <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $sk->sk_nama }}</td>
                    <td>{{ $sk->bobot_relatif }}</td>
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
    