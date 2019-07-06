<!-- Home blade, en el menú se accede a través de "Inicio" -->

@extends('layouts.app')

@section('content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header">
          Dashboard
          {{$user->xtra_field_1}}
        </div>



      </div>
    </div>
  </div>
</div>



@endsection
