@include('layouts.includes.header')
@include('layouts.includes.leftmenu')
@section('editaplikasi')

<div id="content">
  <div class="panel box-shadow-none content-header">
     <div class="panel-body">
       <div class="col-md-12">
           <h3 class="animated fadeInLeft">Uji Aplikasi</h3>
           <p class="animated fadeInDown">
            Home <span class="fa-angle-right fa"></span> Aplikasi <span class="fa-angle-right fa"></span>Karakteristik
        </p>
      </div>
    </div>
  </div>

 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Karakteristik</h3></div>
          <div class="panel-body">
            
            <form action="{{route('store.pk', $aplikasi->a_id)}}" method="POST">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nama Aplikasi :</label>
                        <div>
                          <input type="text" class="form-control" name="a_nama" value="{{ $aplikasi->a_nama}}"required>
                        </div>
                    </div>
                

                    <button type="submit" class="btn btn-primary ">Next</button>
                    <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{asset('/aplikasi')}}" class="btn btn-secondary"> Cancel</a>
            </form>

        </div>
      </div>
    </div>
</div>



