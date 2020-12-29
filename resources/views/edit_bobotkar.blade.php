@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

<div id="content">
  <div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Edit Bobot Karakteristik</h1>
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
          <div class="panel form-element-padding">
            <div class="panel-heading">
              <h4>Edit Bobot Karakteristik</h4>
            </div>
            <div class="panel-body" style="padding-bottom:30px;">
              
          @foreach($karakteristiks as $k)
          <form action="{{route('store.kar',$k->k_id)}}" method="post" class="form-horizontal">
            {{ csrf_field() }}
              
                     
                      <div class="col-md-12">
                       
                        <div class="form-group col-md-4" style="padding-right: 50px">
                            <label class="font-weight-bold">Nama Karakteristik</label>
                            <input type="text" class="form-control" value="{{ $k->k_nama }}" required disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="font-weight-bold">Bobot Karakteristik</label>
                            <input type="text" class="form-control bobot" name="k_bobot" value="{{ $k->k_bobot }}" required>
                        </div>

                        <div class="col-md-4" style="padding-top: 20px">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/home')}}" class="btn btn-secondary"> Cancel</a>
                        </div>      
                                          
                      </div>
                    
                         
            </form>
            @endforeach
            
            <div class="col-md-12" style="float:middle; margin-bottom:10px;">
              @foreach ($aplikasis as $app)
                @if ($total != 1)
                  <a class="btn btn-info btn-sm">
                    <span>belom</span>
                  </a>
                @else
                  <a href="{{route('view.kar',$app->a_id)}}" class="btn btn-info btn-sm">
                    <span>Next</span>
                  </a> 
                @endif
                   
              @endforeach    
                {{-- <input type="text" id="total_bobot" disabled> --}}
                <span class="info-box-number">{{$total}}</span>
            </div>
          </div>
          </div> 
          
        </div>
      </div>  
    </div>
</div>
@section('js')

<script>  
$(document).ready(function() {
  $('#mydatatables').DataTable();
})
</script>
<script>
  // we used jQuery 'keyup' to trigger the computation as the user type
  $('.bobot').keyup(function () {
   
      // initialize the sum (total bobot) to zero
      var sum = 0;
       
      // we use jQuery each() to loop through all the textbox with 'bobot' class
      // and compute the sum for each loop
      $('.bobot').each(function() {
          sum += Number($(this).val());
      });
       
      // set the computed value to 'total_bobot' textbox
      $('#total_bobot').val(sum);
       
  });
  </script>
@endsection


