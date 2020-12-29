@include('layouts.includes.header')
@include('layouts.includes.leftmenu')

@section('content')

  <div id="content">
  <div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>Pengukuran Aplikasi</h1>
                <ol class="breadcrumb">
                    <li><a href="{{asset('/softwaretester/home')}}">Home</a></li>
                    <li><a href="{{asset('/softwaretester/aplikasi')}}">Aplikasi</a></li>
                    <li class="active">Pengukuran Aplikasi</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
 <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading">
            <h3>
                @foreach ($aplikasis as $aplikasi)
                {{ $aplikasi->a_nama }}
                @endforeach
            </h3>
        </div>
          <div class="panel-body">
            @include('admin.shared.components.alert')
            <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th style="width: 5%">ID</th>
                  <th style="width: 15%">Karakteristik</th>
                  <th style="width: 10%">Bobot Karakteristik</th>
                  <th style="width: 15%">Sub Karakteristik</th>
                  <th style="width: 10%">Bobot Relatif</th>
                  <th style="width: 10%">Bobot Absolut</th>
                  <th style="width: 10%">Nilai Subkarakteristik</th>
                  <th style="width: 10%">Nilai Absolut</th>
                  <th style="width: 15%">Tambah Hasil Kuesioner</th>
                </thead>
                <tbody>
                @foreach($subkarakteristiks as $s)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $s->k_nama }}</td>
                    <td>{{ $s->k_bobot }}</td>
                    <td>{{ $s->sk_nama }}</td>
                    <td>{{ $s->bobot_relatif }}</td>
                    <td>{{ $s->bobot_absolut }}</td>
                    <td>{{ $s->nilai_subfaktor }}</td>
                    <td>{{ $s->nilai_absolut }}</td>
                    @if ($s->nilai_absolut == 0)
                      @if ($s->sk_nama == 'Modularity')
                        <td>
                          <a href="{{route('kuisioner',$s->sk_id)}}" class="btn btn-success btn-sm">
                            <span class="fa fa-plus"></span>
                          </a>
                        </td>
                      @elseif ($s->sk_nama == 'Time Behaviour')
                        <td>
                          <a href="{{route('kuisioner',$s->sk_id)}}" class="btn btn-success btn-sm">
                            <span class="fa fa-plus"></span>
                          </a>
                        </td>
                      @elseif ($s->sk_nama == 'Capacity')
                        <td>
                          <a href="{{route('capacity',$s->sk_id)}}" class="btn btn-success btn-sm">
                            <span class="fa fa-plus"></span>
                          </a>
                        </td>
                      @else
                        <td>
                          <a href="{{route('kuisioner',$s->sk_id)}}" class="btn btn-info btn-sm">
                            <span class="fa fa-plus"></span>
                          </a>
                        </td>
                      @endif
                    @else
                    <td>
                      Sukses
                    </td>
                    @endif
                    
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
