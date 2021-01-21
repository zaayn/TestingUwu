@extends('layouts.app_softwaretester')

@section('content_header')
  <div class="col-md-12">
    <div class="panel block">
        <div class="panel-body">
            <h1>Tambah Hasil Kuesioner</h1>
            <ol class="breadcrumb">
                <li><a href="{{asset('/softwaretester/home')}}">Home</a></li>
                <li><a href="{{asset('/softwaretester/aplikasi')}}">Aplikasi</a></li>
                @foreach ($subkarakteristiks as $s)
                <li><a href="{{route('nilai',$s->karakteristik->aplikasi->a_id)}}">Pengukuran Aplikasi</a></li>
                @endforeach
                <li class="active">Tambah Hasil Kuesioner</li>
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
          @include('admin.shared.components.alert')
            <h3>
                @foreach ($subkarakteristiks as $s)
                {{ $s->sk_nama }}
            </h3>
          <form action="{{route('tambah.kuesioner',$s->sk_id)}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Jumlah Responden</label>
                    <input type="text" class="form-control" name="jml_res" required>
                </div>
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Nilai Total Hasil Kuisioner Per Subkarkteristik</label>
                    <input type="text" class="form-control" name="total_per_sub" required>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                    {{-- <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{('/aplikasi')}}" class="btn btn-secondary"> Cancel</a> --}}
                    <a onclick="return confirm('Perubahan anda belum disimpan. Tetap tinggalkan halaman ini ?')" href="{{route('nilai',$s->karakteristik->aplikasi->a_id)}}" class="btn btn-secondary"> Cancel</a>
                 </div>
              </div>
              @endforeach
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

