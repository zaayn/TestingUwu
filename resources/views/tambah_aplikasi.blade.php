@extends('layouts.app_softwaretester')

@section('content_header')
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Tambah Aplikasi</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/softwaretester/home')}}"></i> Home</a></li>
                  <li><a href="{{asset('/softwaretester/aplikasi')}}"></i> Aplikasi</a></li>
                  <li class="active">Tambah Aplikasi</li>
              </ol>
          </div>
      </div>
  </div>
@endsection

@section('content')
 <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel">
          <div class="panel-body">
            <hr>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                </div>
            @endif
            @include('admin.shared.components.alert')  
            <form action="{{route('store.aplikasi')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="form-group">
                  <label>Nama Aplikasi :</label>
                  <div><input type="text" class="form-control"  name="a_nama" required></div>
                </div>                
                <div class="form-group">
                  <label>Url :</label>
                  <div><input type="text" class="form-control"  name="a_url" required></div>
                </div> 
                <div class="form-group">
                  <label>File :</label>
                  <div><input type="file"  name="a_file" required></div>
                </div> 

                <div class="form-group" >
                  <div class="form-animate-radio" required>
                    <label class="radio">
                    <input id="radio1" type="radio" name="radios" value="custom" />
                    <span class="outer">
                      <span class="inner"></span></span> Custom Bobot
                    </label>
                    <label class="radio">
                    <input id="radio2" type="radio" name="radios" value="patokan" />
                    <span class="outer">
                      <span class="inner"></span></span> Gunakan Bobot Patokan
                    </label>
                    <a data-toggle="modal" data-target="#modal_custom" class="btn btn-info btn-md" style="background: white">Lihat Bobot Patokan</a>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary ">Submit</button>
                <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/softwaretester/aplikasi/')}}" class="btn btn-secondary"> Cancel</a>
            </form>

            <div class="col-md-12">
                <div class="modal fade modal-v1" id="modal_custom">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title">
                          <h3>Bobot Patokan</h3>
                        </h2>
                      </div>
                      <div class="modal-body">
                        <table id="datatables-example" class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">Karakteristik</th>
                            <th style="width: 10%">Bobot Karakteristik</th>
                            <th style="width: 15%">Sub Karakteristik</th>
                            <th style="width: 10%">Bobot Relatif</th>
                          </thead>
                          <tbody>
                          @foreach($subkarakteristiks as $key => $s)
                          <tr>
                              @if (@$subkarakteristiks[$key - 1]->k_nama != $s->k_nama)
                                <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $no++ }}</td>
                                <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $s->k_nama }}</td>
                                <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $s->k_bobot }}</td>
                              @endif
                              {{-- <td>{{ $no++ }}</td>
                              <td>{{ $s->k_nama }}</td>
                              <td>{{ $s->k_bobot }}</td> --}}
                              <td>{{ $s->sk_nama }}</td>
                              <td>{{ $s->bobot_relatif }}</td>
                          </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>            
        
          </div>
      </div>
    </div>
</div>
@endsection
