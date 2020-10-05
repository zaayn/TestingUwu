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

    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
                
                <div class="col-md-4">
                    <a href="">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left"></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>

                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1></h1>
                            <p>Time Behaviour</p>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('capacity')}}">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left"></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>

                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1></h1>
                            <p>Capacity</p>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="panel box-v1">
                          <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                              <h4 class="text-left"></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                               <h4>

                               </h4>
                            </div>
                          </div>
                          <div class="panel-body text-center">
                            <h1></h1>
                            <p>Modularity</p>
                            <hr/>
                          </div>
                        </div>
                    </a>
                </div>

        </div>
    </div>
</div>


