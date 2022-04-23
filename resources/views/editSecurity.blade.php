@extends('layouts.index')

@section('content')

<div class="subheader">
	<h1 class="subheader-title">
		 <i class='subheader-icon fal fa-lock'></i> Безопасность
	</h1>
</div>
<form action="{{ route('updateSecurity') }}" method="POST">
	@csrf
	<input type="hidden" value="{{ $userSecurityData->id }}" name="id">
	<div class="row">
		 <div class="col-xl-6">
			  <div id="panel-1" class="panel">
					<div class="panel-container">
						 <div class="panel-hdr">
							  <h2>Обновление эл. адреса и пароля</h2>
						 </div>
						 <div class="panel-content">
							  <!-- email -->
							  <div class="form-group">
									<label class="form-label" for="simpleinput">Email</label>
									<input type="text" id="simpleinput" class="form-control" value="{{ $userSecurityData->email }}" name="email">
							  </div>

							  <!-- password -->
							  <div class="form-group">
									<label class="form-label" for="simpleinput">Пароль</label>
									<input type="password" id="simpleinput" class="form-control" name="password">
									     @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							  </div>

							  <!-- password confirmation-->
							  <div class="form-group">
									<label class="form-label" for="simpleinput">Подтверждение пароля</label>
									<input type="password" id="simpleinput" class="form-control" name="password_confirmation" required>
							  </div>


							  <div class="col-md-12 mt-3 d-flex flex-row-reverse">
									<button class="btn btn-warning">Изменить</button>
							  </div>
						 </div>
					</div>
					
			  </div>
		 </div>
	</div>
</form>

@endsection