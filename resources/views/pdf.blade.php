<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <div class="col-md-12 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        @include('admin.shared.components.alert')
                        <div class="responsive-table">
                            <table id="datatables-example" class="table table-bordered" style='width:100%'>
                                <thead>
                                    <th>ID</th>
                                    <th>K</th>
                                    <th>BK</th>
                                    <th>SK</th>
                                    <th>BR</th>
                                    <th>BA</th>
                                    <th>NS</th>
                                    <th>NA</th>
                                </thead>
                                <tbody>
                                    @foreach($subkarakteristiks as $key => $s)
                                        <tr>                                
                                            @if (@$subkarakteristiks[$key - 1]->k_nama != $s->k_nama)
                                                <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $no++ }}</td>
                                                <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $s->k_nama }}</td>
                                                <td rowspan="{{ $rowspan[$s->k_nama] }}">{{ $s->k_bobot }}</td>
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
    </body>
</html>