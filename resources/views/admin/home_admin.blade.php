@include('layouts.includes.admin_header')
@include('layouts.includes.admin_leftmenu')
@section('tabeladmin')

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-left: 10%;
  margin-bottom: 105px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5DADE2;
  color: white;
}

</style>

<div id="content">
    <div class="panel">
      <div class="panel-body">
          <div class="col-md-6 col-sm-12">
            <h3 class="animated fadeInLeft">WELCOME {{ Auth::user()->name }}</h3>
            <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
              <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Banyumas</h3>
              <h1 style="margin-top: -10px;color: #ddd;">30<sup>o</sup></h1>
            </div>
            <div class="col-md-6 col-sm-6">
               <div class="wheather">
                <div class="stormy rainy animated pulse infinite">
                  <div class="shadow">
                    
                  </div>
                </div>
                <div class="sub-wheather">
                  <div class="thunder">
                    
                  </div>
                  <div class="rain">
                      <div class="droplet droplet1"></div>
                      <div class="droplet droplet2"></div>
                      <div class="droplet droplet3"></div>
                      <div class="droplet droplet4"></div>
                      <div class="droplet droplet5"></div>
                      <div class="droplet droplet6"></div>
                    </div>
                </div>
              </div>
            </div>                   
        </div>
      </div>                    
    </div>

    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
                
                <div class="col-md-4">
                    <a href="{{asset('/admin/karakteristik')}}">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left">Karakteristik</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>
                               <span class="icon-user icons icon text-right"></span>
                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1>{{$karakteristik}}</h1>
                            <p>User active</p>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{asset('/admin/tambahbobot')}}">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left">SubKarakteristik</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>
                               <span class="icon-basket-loaded icons icon text-right"></span>
                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1>{{$subkarakteristik}}</h1>
                            <p>New Orders</p>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{asset('/admin/kelolaadmin')}}">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left">Admin</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>
                               <span class="icon-basket-loaded icons icon text-right"></span>
                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1>{{$admin}}</h1>
                            <p>New Orders</p>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>

        </div>
    </div>
</div>


