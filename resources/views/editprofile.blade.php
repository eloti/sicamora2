@extends('layouts.app')

@section('title', "| EditProfile")

@section('content')

<div class="container-fluid" style="padding: 0">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card auth">
        <div class="card-header profile">
          Edite su perfil * <i class="fas fa-address-card"></i>
        </div>

        <div class="card-body container-fluid flex-card px-1">

          {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'col-12 px-0 flex-card']) !!}

            <div class="row col-12">
              <h6>* Marque a la derecha de cada campo si prefiere mantener el dato privado</h6>
            </div>

            <div class="row image_container col-12">
              <div class="col-6 special_button_container">
                <label class="btn buttontype1">
                  <input type="file" name="user_image">
                  Cambie o suba una imagen
                </label>
              </div>
              <div class="col-6">
                <div class="image_container">
                  <img class="user_image" src="/storage/uploads/user_images/{{$user->user_image}}">
                </div>
              </div>
            </div>

          <p class="mini_row_break"></p>

            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
              {!! Form::label('name', 'Nombre: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
              {!! Form::text('name', $user->name, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
                <label class="checkbox" for="priv_name"></label>
                  @if($user->priv_name === 1)
                    <input type="checkbox" name="priv_name" value="1" checked>
                  @else
                    <input type="checkbox" name="priv_name" value="1">
                  @endif
              </div>
            </div>

          <p class="mini_row_break"></p>

            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
              {!! Form::label('alias', 'Alias: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
              {!! Form::text('alias', $user->alias, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">

            </div>
          </div>

        <p class="mini_row_break"></p>

            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
              {!! Form::label('id', 'ID de usuario: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
              {!! Form::text('id', $user->id, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control', 'readonly']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
                <label class="checkbox" for="priv_id"></label>
                  @if($user->priv_id === 1)
                    <input type="checkbox" name="priv_id" value="1" checked>
                  @else
                    <input type="checkbox" name="priv_id" value="1">
                  @endif
              </div>
            </div>

          <p class="mini_row_break"></p>

            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
              {!! Form::label('email', 'E-Mail: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
              {!! Form::text('email', $user->email, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control', 'readonly']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
                <label class="checkbox" for="priv_email"></label>
                  @if($user->priv_email === 1)
                    <input type="checkbox" name="priv_email" value="1" checked>
                  @else
                    <input type="checkbox" name="priv_email" value="1">
                  @endif
              </div>
            </div>

          <p class="mini_row_break"></p>

            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
              {!! Form::label('created_at', 'Miembro desde: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
              {!! Form::date('created_at', $user->created_at, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control', 'readonly']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">

              </div>
            </div>

          <p class="mini_row_break"></p>

          <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
            {!! Form::label('gender', 'Género: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
            <div class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 no_padding_div">
              <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 radio_buttons_div">
                @if($user->gender == "Femenino")
                  {!! Form::radio('gender', 'Femenino', true) !!}<span class=radio_label> {{'Femenino'}}</span>
                @else
                  {!! Form::radio('gender', 'Femenino') !!}<span class=radio_label> {{'Femenino'}}</span>
                @endif
              </div>
              <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 radio_buttons_div">
                @if($user->gender == "Masculino")
                  {!! Form::radio('gender', 'Masculino', true) !!}<span class=radio_label> {{'Masculino'}}</span>
                @else
                  {!! Form::radio('gender', 'Masculino') !!}<span class=radio_label> {{'Masculino'}}</span>
                @endif
              </div>
              <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 radio_buttons_div">
                @if($user->gender == "Otro")
                  {!! Form::radio('gender', 'Otro', true) !!}<span class=radio_label> {{'Otro'}}</span>
                @else
                  {!! Form::radio('gender', 'Otro') !!}<span class=radio_label> {{'Otro'}}</span>
                @endif
              </div>
            </div>
            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
              <label class="checkbox" for="priv_gender"></label>
                @if($user->priv_gender === 1)
                  <input type="checkbox" name="priv_gender" value="1" checked>
                @else
                  <input type="checkbox" name="priv_gender" value="1">
                @endif
            </div>
          </div>

        <p class="mini_row_break"></p>

          <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
            {!! Form::label('birth', 'Fecha de nacimiento: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
            {!! Form::date('birth', $user->birth, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
              <label class="checkbox" for="priv_birth"></label>
                @if($user->priv_birth === 1)
                  <input type="checkbox" name="priv_birth" value="1" checked>
                @else
                  <input type="checkbox" name="priv_birth" value="1">
                @endif
            </div>
          </div>

        <p class="mini_row_break"></p>

          <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
            {!! Form::label('city', 'Ciudad: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
            {!! Form::text('city', $user->city, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
                <label class="checkbox" for="priv_city"></label>
                  @if($user->priv_city === 1)
                    <input type="checkbox" name="priv_city" value="1" checked>
                  @else
                    <input type="checkbox" name="priv_city" value="1">
                  @endif
              </div>
          </div>

        <p class="mini_row_break"></p>

          <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
            {!! Form::label('province_state', 'Provincia/ Estado: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
            {!! Form::text('province_state', $user->province_state, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
                <label class="checkbox" for="priv_province_state"></label>
                  @if($user->priv_province_state === 1)
                    <input type="checkbox" name="priv_province_state" value="1" checked>
                  @else
                    <input type="checkbox" name="priv_province_state" value="1">
                  @endif
              </div>
          </div>

        <p class="mini_row_break"></p>

          <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
            {!! Form::label('country', 'País: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
            {!! Form::text('country', $user->country, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
                <label class="checkbox" for="priv_country"></label>
                  @if($user->priv_country === 1)
                    <input type="checkbox" name="priv_country" value="1" checked>
                  @else
                    <input type="checkbox" name="priv_country" value="1">
                  @endif
              </div>
          </div>

        <p class="mini_row_break"></p>

        <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
          {!! Form::label('language_id', 'Idiomas: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
          <div class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 no_padding_div_flex">
            @foreach($languages as $oneLanguage)

                @foreach($user->language as $lang)
                  @if($oneLanguage->id === $lang->id)
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 radio_buttons_div">
                      {!! Form::checkbox('language_id[]', $oneLanguage->id, true) !!}<span class=radio_label> {{$oneLanguage->value}}</span>
                    </div>
                    @php continue 2; @endphp
                  @endif
                @endforeach

              @if($oneLanguage->closed_at == null)
                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 radio_buttons_div">
                  {!! Form::checkbox('language_id[]', $oneLanguage->id) !!}<span class=radio_label> {{$oneLanguage->value}}</span>
                </div>
              @endif

            @endforeach
          </div>
            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
            </div>
        </div>

        <p class="mini_row_break"></p>

        <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
          {!! Form::label('about', 'Acerca de mi: ', ['class' => 'col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3, col-form-label']) !!}
          {!! Form::textarea('about', $user->about, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control']) !!}
          <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 px-0 mx-0" style="text-align: center">
            <label class="checkbox" for="priv_about"></label>
              @if($user->priv_about === 1)
                <input type="checkbox" name="priv_about" value="1" checked>
                @else
                <input type="checkbox" name="priv_about" value="1">
                @endif
          </div>
        </div>

      </div> <!-- Fin de card body -->

      <div class="card-footer button_container">
        <a href="/profile" class="btn buttontype1 action_button">
          {{ __('Cancelar') }}
        </a>
        {{Form::submit('Actualizar', ['class' =>'btn buttontype1'])}}
        {{Form::hidden('_method', 'PUT')}} <!--esto cambia el método de POST a PUT-->
        {!! Form::close() !!}
      </div>

      </div> <!-- Fin de card -->
    </div>
  </div>
</div>
@endsection
