@extends('layouts.login')

@section('content')
<div class="blankpage-form-field">
	<div
		class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
		<a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
			<img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
			<span class="page-logo-text mr-1">Учебный проект</span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
		<div class="alert alert-success">
			Регистрация успешна
		</div>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username" class="form-label">{{ __('E-Mail') }}</label>
                            <input id="username" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Эл. адрес" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Пароль') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group text-left">
									<div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                              <label class="custom-control-label" for="rememberme">
                                        {{ __('Запомнить меня') }}
                              </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default float-right">Войти</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           {{ __('Забыли пароль?') }}
                        </a>
                    </form>
	</div>
		<div class="blankpage-footer text-center">
			Нет аккаунта? <a href="{{route('register')}}"><strong>Зарегистрироваться</strong>
		</div>
</div>
@endsection
