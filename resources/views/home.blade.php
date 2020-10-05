@include('layouts.includes.header')
@include('layouts.includes.leftmenu')
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

    
</div>


