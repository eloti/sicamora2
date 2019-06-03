@extends('layouts.app')

@section('title', "| ResetPassword")

@section('content')
<br>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card auth">
        <div class="card-header auth">{{ __('Reestablecer contraseña') }} <i class="fas fa-unlock-alt"></i></div>

          <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                  <label for="email" class="col-12 col-form-label text-md-left">{{ __('E-Mail') }}</label>

                    <div class="col-12">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-12 col-form-label text-md-left">{{ __('Contraseña Nueva') }}</label>

                    <div class="col-12">
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                  <label for="password-confirm" class="col-12 col-form-label text-md-left">{{ __('Confirme Contraseña Nueva') }}</label>

                  <div class="col-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4" style="display: flex; align-items: center; justify-content: center">
                    <button type="submit" class="btn buttontype1">
                      {{ __('Restablecer Contraseña') }}
                    </button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
