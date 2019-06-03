@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header profile">
          Edite su perfil
        </div>

        <div class="card-body container-fluid">


        <form method="POST" enctype="multipart/form-data" action="/profile/{{$user->id}}">
          {{method_field('PUT')}}
          {{csrf_field()}}



            <img src="/storage/uploads/user_images/{{$user->user_image}}" style="width: 150px; height: 150px; float-left; border-radius: 50%; margin-right:25px;">

            <label class="col-md-2 col-form-label text-md-right">{{ __('Cambie su imagen') }}</label>
            <input type="file" name="user_image">

            <label for="id" class="col-md-2 col-form-label text-md-right">{{ __('ID') }}</label>
            <div class="col-md-2">
              <input id="id" type="text" class="form-control" name="id" value="{{$user->id}}" readonly>
            </div>

            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>

            <label for="gender" class="col-md-2 col-form-label text-md-right">{{ __('Género') }}</label>
              @if($user->gender == "Femenino")
                <input type="radio" name="gender" value="Femenino" checked>Femenino<br>
              @else
                <input type="radio" name="gender" value="Femenino">Femenino<br>
              @endif
              @if($user->gender == "Masculino")
                <input type="radio" name="gender" value="Masculino" checked>Masculino<br>
              @else
                <input type="radio" name="gender" value="Masculino">Masculino<br>
              @endif
              @if($user->gender == "Otro")
                <input type="radio" name="gender" value="Otro" checked>Otro <br>
              @else
                <input type="radio" name="gender" value="Otro">Otro <br>
              @endif

            <label for="birth" class="col-md-2 col-form-label text-md-right">{{ __('Fecha de nacimiento:') }}</label>
            <div class="col-md-6">
              <input id="birth" type="date" class="form-control" name="birth" value="{{$user->birth}}">
            </div>

            <label for="city" class="col-md-2 col-form-label text-md-right">{{ __('Ciudad:') }}</label>
            <div class="col-md-6">
              <input id="city" type="text" class="form-control" name="city" value="{{$user->city}}">
            </div>

            <label for="province_state" class="col-md-2 col-form-label text-md-right">{{ __('Provincia/Estado:') }}</label>
            <div class="col-md-6">
              <input id="province_state" type="text" class="form-control" name="province_state" value="{{$user->province_state}}">
            </div>

            <label for="country" class="col-md-2 col-form-label text-md-right">{{ __('País:') }}</label>
            <div class="col-md-6">
              <input id="country" type="text" class="form-control" name="country" value="{{$user->country}}">
            </div>

            <div class="form-group row">
                  <label for="language_id" class="col-md-2 col-form-label text-md-right">{{ __('Idiomas:') }}</label>
                    <div class="col-md-10">
                      <div class="container-fluid checkboxes">
                        <div class="row">
                          @foreach($languages as $oneLanguage)

                            @foreach($user->language as $lang)

                              @if($oneLanguage->id == $lang->id)
                                  <div class="col-md-3">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name="language_id[]" value="{{$oneLanguage->id}}" checked>
                                      {{$oneLanguage->value}}
                                    </label>
                                  </div>
                                @php continue 2; @endphp
                              @endif

                            @endforeach

                              <div class="col-md-3">
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="language_id[]" value="{{$oneLanguage->id}}">
                                  {{$oneLanguage->value}}
                                </label>
                              </div>

                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>


          </div>

          <div class="card-footer">
            <div class="form-group row mb-0">
              <div class="col-md-6 text-center">
                <a href="/profile" class="btn btn-primary btn-sm action_button">
                      {{ __('Cancelar') }}
                </a>
              </div>
              <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary btn-sm">
                  {{ __('Actualizar') }}
                </button>
              </div>
            </div>
          </div>

        </form>

      </div> <!-- Fin de card -->
    </div>
  </div>
</div>
@endsection
