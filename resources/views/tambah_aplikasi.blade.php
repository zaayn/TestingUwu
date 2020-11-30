@include('layouts.includes.header')
@include('layouts.includes.leftmenu')
@section('content')

<div id="content">
  <div class="panel box-shadow-none content-header">
     <div class="panel-body">
       <div class="col-md-12">
           <h3 class="animated fadeInLeft">Uji Aplikasi</h3>
           <p class="animated fadeInDown">
        </p>
      </div>
    </div>
  </div>

 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Spesifikasi Aplikasi</h3></div>
          <div class="panel-body">

            <form action="{{route('store.aplikasi')}}" method="post">
                {{ csrf_field() }} 
                <div class="form-group">
                  <label>Nama Aplikasi :</label>
                  <div><input type="text" class="form-control"  name="a_nama" required></div>
                </div>
                <div class="form-group">
                  <label>Url :</label>
                  <div><input type="text" class="form-control"  name="a_url" required></div>
                </div>           

                <button type="submit" class="btn btn-primary ">Submit</button>
                <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/home')}}" class="btn btn-secondary"> Cancel</a>
            </form>
            

        </div>
      </div>
    </div>

</div>