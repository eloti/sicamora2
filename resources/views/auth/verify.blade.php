@extends('layouts.app')

@section('title', "| Verificación")

@section('content')
<br>
<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth">
                <div class="card-header auth">{{ __('Verifique su dirección de E-mail') }} <i class="fas fa-envelope-open-text"></i></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Hemos enviado a su dirección de E-mail un enlace de verificación.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor revise su casilla de E-mail donde encontrará un correo con un enlace de verificación.') }}
                    {{ __('Si no ha recibido el E-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('haga click aquí para solicitar otro') }}</a>.

                    {{ __('Si ha recibido el mail con el enlace de verificación, cierre esta ventana.')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
