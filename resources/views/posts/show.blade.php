<!-- Show Post Blade -->

@extends('layouts.app')

@section('title', "| Un Post")

@section('content')

<div class="container">

<div class="row">

  <div class="col-12">

    <div class="card show">

      <div class="card-header">
        <h3 class="subtitle_h3_nolines">{{$post->title}}</h3>
      </div>

      <div class="card-body">
        <p class="card-text postbody" style="text-align: justify">{{$post->body}}</p>
      </div>

    </div>

  </div>

  <div class="col-12">

    <div class="card comments">

      <div class="card-header">
        <h4 class="subtitle_h3_nolines">Detalles y Comentarios</h4>
      </div>

      <div class="card-body">

        <div class="row cardcomments">
          <div class="col-12">
            <div class="row card-text postbody">
              <dt><dfn>Género:&nbsp</dfn></dt>
              <dd> {{$post->genre->value}}</dd>
            </div>
            <div class="row card-text postbody">
              <dt><dfn>Publicado el:&nbsp</dfn></dt>
              <dd>{!!$post->created_at()!!}</dd>
            </div>
            <div class="row card-text postbody">
              <dt><dfn>Última actualización:&nbsp</dfn></dt>
              <dd> {!!$post->updated_at()!!}</dd>
            </div>
          </div>
        </div>


        <div class=container>
          <div class="row">
          <div class="col-6">
            <a href="#" class="btn btn-primary btn-block">Editar</a>
          </div>
          <div class="col-6">
            <a href="#" class="btn btn-success btn-block">Borrar</a>
          </div>
        </div>
        
        </div>


        <div class="row">
          <div class="col-12">
            <h3>Comentarios:</h3>
          </div>
        </div>

      </div>
      </div>
    </div>

  </div>
  </div>




@endsection
