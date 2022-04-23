@extends('layouts.register')

@section('content')
<div class="flex-1"
	style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
	<div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
		<div class="row">
			<div class="col-xl-12">
				<h2 class="fs-xxl fw-500 mt-4 text-white text-center">
					Регистрация
					<small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
						Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.
						<br>
						По своей сути рыбатекст является альтернативой традиционному lorem ipsum

					</small>
				</h2>
			</div>
			<div class="col-xl-6 ml-auto mr-auto">
				<div class="card p-4 rounded-plus bg-faded">
					<div class="alert alert-danger text-dark" role="alert">
						<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.
					</div>
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" id="js-login" novalidate="">
                        @csrf

                        <div class="form-group">
                            <label for="emailverify" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" id="emailverify" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Эл. адрес" required>
									 <div class="invalid-feedback">Заполните поле.</div>
									 <div class="help-block">Эл. адрес будет вашим логином при авторизации</div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="userpassword" class="form-label">{{ __('Пароль ') }}<br></label>
                            <input id="password" id="userpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="" required>
									 <div class="invalid-feedback">Заполните поле.</div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label">{{ __('Подтвердить пароль') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="row no-gutters">
									<div class="col-md-4 ml-auto text-right">
										<button id="js-login-btn" type="submit" class="btn btn-block btn-danger btn-lg mt-3">Регистрация</button>
									</div>
								</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
