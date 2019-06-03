@extends('layouts.app')

@section('title', "| Login")

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth">
                <div class="card-header auth">
                  {{ __('Inicie sesión') }}  <i class="fas fa-sign-in-alt"></i>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label text-md-left">{{ __('E-Mail') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-form-label text-md-left">{{ __('Contraseña') }}</label>

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
                            <div class="col-6" style="display: flex; align-items: center; justify-content: center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        <!--/div>

                        <div class="form-group row mb-0"-->
                            <div class="col-6" style="display: flex; align-items: center; justify-content: center">
                                <button type="submit" class="btn buttontype1">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            </div>
                        </div>

                            <div class="form-group row">
                                <div class="col-12" style="display: flex; align-items: center; justify-content: center">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 0.75em; color: darkgreen">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif

                              </div>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
