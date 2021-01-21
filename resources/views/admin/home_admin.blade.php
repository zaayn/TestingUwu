@extends('layouts.app_admin')

@section('css')
<style>
    body{
        overflow: hidden;
    }
</style>
@endsection

@section('content_header')
<div class="col-md-12 padding-1">
    <div class="panel block">
        <div class="panel-body">
            <h3> Halo, {{ Auth::user()->name }}</h3>
            <h4>Selamat Datang di Aplikasi Pengukuran Kualitas Perangkat Lunak </h4>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="col-s-12 padding-1>
        <div class="col-md-12 padding-0">
                <div class="col-md-3">
                    <a href="{{asset('/admin/karakteristik')}}">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left">Karakteristik</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>
                               <!-- <span class="icon-user icons icon text-right"></span> -->
                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1>{{$karakteristik}}</h1>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{asset('/admin/tambahbobot')}}">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left">SubKarakteristik</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>
                               <!-- <span class="icon-basket-loaded icons icon text-right"></span> -->
                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1>{{$subkarakteristik}}</h1>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{asset('/admin/kelolaadmin')}}">
                      <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">Admin</h4>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                              <h4>
                              <!-- <span class="icon-basket-loaded icons icon text-right"></span> -->
                              </h4>
                          </div>
                        </div>
                        <div class="panel-body text-center">
                          <h1>{{$admin}}</h1>
                          <hr/>
                        </div>
                      </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{asset('/admin/kelolasoftwaretester')}}">
                      <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                            <h4 class="text-left">Software Tester</h4>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                              <h4>
                              <!-- <span class="icon-basket-loaded icons icon text-right"></span> -->
                              </h4>
                          </div>
                        </div>
                        <div class="panel-body text-center">
                          <h1>{{$softwaretester}}</h1>
                          <hr/>
                        </div>
                      </div>
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection