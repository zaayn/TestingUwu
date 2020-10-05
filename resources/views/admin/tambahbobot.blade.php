@include('layouts.includes.admin_header')
@include('layouts.includes.admin_leftmenu')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Testing Application">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Testing Application</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->


  <div class="form-group"><label class="col-sm-2 control-label text-right">Password</label>
  		<div class="col-sm-10"><input type="password" class="form-control"></div>
  </div>


<!-- start: Content -->
            <div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">BOBOT RELATIF</h3>
                        <!--<p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Form Element
                        </p>-->
                    </div>
                  </div>
                </div>
      
        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Daftar SubKarakteristik</h3></div>
                <div class="panel-body">
                  <a href="{{asset('/admin/karakteristik')}}" class="btn btn-info btn-md">Karakteristik</a><br><br>
                  <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <th>ID</th>
                        <th>Karakteristik</th>
                        <th>Nama SubKarakteristik</th>
                        <th>Bobot Relatif</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                      @foreach($subkarakteristiks as $subkarakteristik)
                      <tr>
                        <td>{{ $subkarakteristik->sk_id }}</td>
                        <td>{{ $subkarakteristik->karakteristik->k_nama }}</td>
                        <td>{{ $subkarakteristik->sk_nama }}</td>
                        <td>{{ $subkarakteristik->bobot_relatif }}</td>
      
                        <td>
                          <a href="{{route('edit.sub',$subkarakteristik->sk_id)}}" class="btn btn-info btn-sm">
                            <span class="fa fa-pencil"></span>
                          </a>
                          <a onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" href="#" class="btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <a href="#" class="btn btn-info btn-md">Tambah Subkarakteristik</a>
              </div>
            </div>
          </div>
      </div>
    </div>

                

