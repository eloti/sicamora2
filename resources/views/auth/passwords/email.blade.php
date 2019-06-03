@extends('layouts.app')

@section('title', "| PasswordReset")

@section('content')
<br>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card auth">
        <div class="card-header auth">{{ __('Reestablecer contraseña') }} <i class="fas fa-unlock-alt"></i></div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="form-group row">
                <label for="email" class="col-12 col-form-label text-md-left">{{ __('E-Mail') }}</label>

                  <div class="col-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-12" style="display: flex; align-items: center; justify-content: center">
                  <button type="submit" class="btn buttontype1">
                    {{ __('Enviar enlace de reestablecimiento de contraseña') }}
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
