@extends('layouts.app_topnav')

@section('content_header')
<div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Custom Subkarakteristik</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">
        <div class="table-responsive">
            {{ csrf_field() }}
            <table id="editable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Subkarakteristik</th>
                  <th>Bobot Subkarakteristik
                    <a id="belom" data-toggle="popover" title="Warning" data-content="Total dari subkarakteristik Harus sama dengan 1. Lihat dibawah untuk mengetahui hasil saat ini" href="#"><span class="badge badge-danger">?</span></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($subkarakteristiks as $s)
                <tr>
                    <td>{{ $s->sk_id}}</td>
                    <td>{{ $s->sk_nama }}</td>
                    <td>{{ $s->bobot_relatif }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <table class="table table-bordered">
              <tr>
                <td style="text-align: center">Total :<span class="info-box-number">{{$total}}</span></td>
              </tr>
            </table>
            
            @foreach($aplikasis as $app)
            <a style="height: 40px" href="{{route('custom.kar',$app->a_id)}}" id="next" class="btn btn-info btn-sm col-md-12"  >
              <span>Next</span>
            </a>
            @endforeach
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function toggleNext(sum){
  if(sum == 1){
    $("#next").show();
    $("#belom").hide();
  }
  else{
    $("#next").hide();
    $("#belom").show();
  }
}

$(document).ready(function(){
  toggleNext(Number($('.info-box-number').html()));

  $.ajaxSetup({
    headers:{
      'X-CSRF-Token' : $("input[name=_token]").val()
    }
  });

  $('#editable').Tabledit({
    url:'{{ route("action.sub") }}',
    dataType:"json",
    columns:{
      identifier:[0, 'sk_id'],
      editable:[[2, 'bobot_relatif']]
    },
    deleteButton:false,
    restoreButton:false,
    onAlways:function(){
      var sum = 0;
       
      // we use jQuery each() to loop through all the textbox with 'bobot' class
      // and compute the sum for each loop
      $('input[name="bobot_relatif"]').each(function() {
          let val = Number($(this).val());
          if(!isNaN(val))
            sum += val;
          if(sum == 0.30000000000000004)
          sum = 0.3
      });
       
      // set the computed value to 'total_bobot' textbox
      $('.info-box-number').html(sum);

      toggleNext(sum);
    },
    onSuccess:function(data, textStatus, jqXHR)
    {
      if(data.action == 'delete')
      {
        $('#'+data.sk_id).remove();
      }
    }
  });

});  
</script>
<script>
	$(document).ready(function(){
	  $('[data-toggle="popover"]').popover();
	});
</script>
@endsection
