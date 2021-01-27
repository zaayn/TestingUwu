@extends('layouts.app_softwaretester')

@section('content_header') 
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Daftar Aplikasi</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/softwaretester/home')}}"></i> Home</a></li>
                  <li class="active">Aplikasi</li>
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
                <button onclick="window.print()">Print this page</button>
                <div class="responsive-table">
                    <table id="datatables-example" class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Karakteristik</th>
                            <th>Bobot Karakteristik</th>
                            <th>Nilai karakteristik</th>
                            <th>Sub Karakteristik</th>
                            <th>Bobot Relatif</th>
                            <th>Bobot Absolut</th>
                            <th>Nilai Subkarakteristik</th>
                            <th>Nilai Absolut</th>
                        </thead>
                        <tbody>
                            @foreach($subkarakteristiks as $key => $s)
                                <tr>                                
                                    @if (@$subkarakteristiks[$key - 1]->k_nama != $s->k_nama)
                                        <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $no++ }}</td>
                                        <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $s->k_nama }}</td>
                                        <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $s->k_bobot }}</td>
                                        <td rowspan="{{ $rowspan[$s->k_nama] }}">81.25</td>
                                    @endif
                                        <td>{{ $s->sk_nama }}</td>
                                        <td>{{ $s->bobot_relatif }}</td>
                                        <td>{{ $s->bobot_absolut }}</td>
                                        <td>{{ $s->nilai_subfaktor }}</td>
                                        <td>{{ $s->nilai_absolut }}</td>                                        
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>          
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection