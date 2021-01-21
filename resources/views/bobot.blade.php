@extends('layouts.app_softwaretester')

@section('content_header')
  <div class="col-md-12">
      <div class="panel block">
          <div class="panel-body">
              <h1>Bobot Karakteristik dan Sub Karakteristik</h1>
              <ol class="breadcrumb">
                  <li><a href="{{asset('/softwaretester/home')}}"></i> Home</a></li>
                  <li class="active">Bobot Karakteristik dan Sub Karakteristik</li>
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
          </div>
        </div>
      </div>
  </div>
@endsection
    