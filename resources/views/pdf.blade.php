<!DOCTYPE html>
<html lang="en">
    <head>
        <div class="col-md-12">
            <div class="panel block">
                <div class="panel-body" style="text-align: center">
                    <h1>Hasil Pengukuran Aplikasi</h1>
                    @foreach ($aplikasis as $aplikasi)
                    <h4> 
                        Nama Aplikasi: {{ $aplikasi->a_nama }}
                    </h4>
                    <h4> 
                        URL : {{$aplikasi->a_url}} 
                    </h4>
                    @endforeach
                </div>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    </head>
    
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        @include('admin.shared.components.alert')
                        {{-- <button onclick="window.print()">Print this page</button> --}}
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
                            {{-- @foreach ($aplikasis as $aplikasi)
                            <a href="{{route('cetak_pdf',$aplikasi->a_id)}}">Print PDF</a>
                            @endforeach
                             --}}
                             {{-- <button onclick="window.print()">Print this page</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>