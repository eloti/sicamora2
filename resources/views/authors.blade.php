<!-- Welcome blade, muestra todas la publicaciones, la idea es ordenarlas por popularidad
Una visita accede clickeando "Inicio" en el navbar
El controlador es PagesController.php -->

@extends('layouts.app')

@section('title', "| Bienvenido")

@section('content')

<br>

<div class="container">

    <h2 class="mainsubtitle">Los autores de</h2>
    <h1 class="maintitle">SicaMorA</h1>

</div>

<br>

<div class="container">

  <div class="row">

    <div class="col-12">


        <div class="row">
          @foreach($authors as $oneAuthor)
          <div class="card col-4">
            <div class="card-header" style="margin-top: 6px">
              <div class="row">
                <div class="col-10">
                  {{$oneAuthor->alias}} / {{$oneAuthor->id}}
                </div>
                <div class="col-2">
                  <img src="/storage/uploads/user_images/{{ $oneAuthor->user_image }}" style="width: 40px; height: 40px; border-radius: 50%;">
                </div>
              </div>
            </div>

            <div class="card-body">
              <label>En Sicamora desde:</label>
              <span>{{$oneAuthor->created_at()}}</span>
              <br>
              <label>Publicaciones:</label>
              <span>{{$oneAuthor->posts}}</span>
            </div>

            <div class="card-footer" style="margin-bottom: 6px">
              <div class="row">
                <div class="col-4"></div>
                <a href="/author/{{$oneAuthor->id}}" class="btn buttontype1 col-4">Más detalles</a>
                <div class="col-4"></div>
              </div>
            </div>

          </div>
          @endforeach

        </div>

    </div> <!-- end of showing posts -->

  </div> <!-- end of row -->

</div> <!-- end of container -->

@endsection
