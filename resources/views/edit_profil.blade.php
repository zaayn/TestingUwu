@include('layouts.includes.header')
@include('layouts.includes.leftmenu')
@section('content')
<div class="col-md-2">
</div>
<div class="col-md-9" style="padding:100px; padding-top:5%">
	<h2 style="color: #6699cc" align="center">Edit Profil</h2>

	@foreach($users as $u)

	<form form action="/softwaretester/update" method="post" class="form-horizontal">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $u->id }}"> <br/>

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	        <label for="name" class="col-md-4 control-label">Nama</label>

	        <div class="col-md-6">
	            <input id="name" type="text" class="form-control" name="name" value="{{ $u->name }}" required autofocus>

	            @if ($errors->has('name'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('name') }}</strong>
	                </span>
	            @endif
	        </div>
	    </div>		

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $u->email }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('instansi') ? ' has-error' : '' }}">
            <label for="instansi" class="col-md-4 control-label">Instansi</label>

            <div class="col-md-6">
                <input id="instansi" type="text" class="form-control" name="instansi" value="{{ $u->instansi }}" required>

                @if ($errors->has('instansi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('instansi') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                    Simpan
                </button>
            </div>
        </div>

	</form>
	@endforeach		
</div>