@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

<div id="content">
  <div class="panel box-shadow-none content-header">
     <div class="panel-body">
       <div class="col-md-12">
           <h3 class="animated fadeInLeft">
             @foreach ($subkarakteristiks as $subs)
              {{$subs->karakteristik->aplikasi->a_nama}}
             @endforeach
           </h3>
           <p class="animated fadeInDown">
        </p>
      </div>
    </div>
  </div>

 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading">
          <h3>
            @foreach ($subkarakteristiks as $subs)
              {{$subs->sk_nama}}
            @endforeach
          </h3>
        </div>
          <div class="panel-body">

            <form action="{{route('update.subs', $subs->sk_id)}}" method="post">
              {{ csrf_field() }}
                
                <div class="form-group">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Jumlah Responden</label>
                        <input type="text" class="form-control" name="jumlah_responden" value="{{ $subs->jumlah_responden}}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Nilai Total Hasil Kuisioner Per Subkarkteristik</label>
                        <input type="text" class="form-control" name="ps_nilai" value="{{ $subs->ps_nilai}}" required>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                        <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/home')}}" class="btn btn-secondary"> Cancel</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".select2").select2({
      placeholder: "Select a state",
      allowClear: true
    });
});
</script>

