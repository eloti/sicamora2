@extends('layouts.app')

@section('title', "| Profile")

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card auth">
        <div class="card-header profile">
          Su Perfil <i class="fas fa-address-card"></i>
        </div>

        <div class="card-body container-fluid flex-card px-1">

          {!! Form::model($user, ['route' => ['profile', $user->id], 'class' => 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 flex-card']) !!}
          <div class="row image_container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <img class="user_image" src="/storage/uploads/user_images/{{$user->user_image}}">
          </div>
          <p class="mini_row_break col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></p>
          <p class="mini_row_break col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></p>
          <p class="mini_row_break col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0 mx-0">
              {!! Form::label('id', 'ID de usuario: ', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
              {!! Form::text('id', $user->id, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_id == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->name == !null)
                {!! Form::label('name', 'Nombre: ', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                {!! Form::text('name', $user->name, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_name == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              {!! Form::label('alias', 'Alias: ', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
              {!! Form::text('alias', $user->alias, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">

              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              {!! Form::label('email', 'E-Mail: ', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
              {!! Form::text('email', $user->email, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_email == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              {!! Form::label('created_at', 'Miembro desde:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
              {!! Form::text('created_at', $user->created_at(), ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">

              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->gender == !null)
                {!! Form::label('gender', 'Género:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                {!! Form::text('gender', $user->gender, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_gender == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->birth == !null)
                {!! Form::label('age', 'Edad:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                {!! Form::text('age', $myTime->diffInYears($user->birth)." años", ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_birth == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->city == !null)
                {!! Form::label('city', 'Ciudad:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                {!! Form::text('city', $user->city, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_city == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->province_state == !null)
              {!! Form::label('province_state', 'Provincia/ Estado:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
              {!! Form::text('province_state', $user->province_state, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_province_state == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->country == !null)
                {!! Form::label('country', 'País:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                {!! Form::text('country', $user->country, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_country == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>

          <p class="mini_row_break"></p>

            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if(count($user->language)>0)
                {!! Form::label('language', 'Idiomas:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 no_padding_div">
                    @foreach($user->language->sortBy('value') as $language)
                      {!! Form::text('language', $language->value, ['class' => 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12, form-control']) !!}
                    @endforeach
                  </div>
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">

              </div>
            </div>
          <p class="mini_row_break"></p>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-6 px-0 col-xl-6 mx-0">
              @if($user->about == !null)
                {!! Form::label('about', 'Acerca de mi:', ['class' => 'col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4, col-form-label']) !!}
                {!! Form::textarea('about', $user->about, ['class' => 'col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6, form-control']) !!}
              @endif
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 px-0 mx-0" style="text-align: center; color:red; font-size: 10px;">
                @if($user->priv_about == 1)
                  <b>{{"Privado"}}</b>
                @endif
              </div>
            </div>
          {!! Form::close() !!}
        </div> <!-- Fin de card body -->

        <div class="card-footer button_container">
          <a class="btn buttontype1" href="/editprofile" role="botton">Editar perfil</a>

        </div>

      </div> <!-- Fin de card -->
    </div>
  </div>
</div>
@endsection
