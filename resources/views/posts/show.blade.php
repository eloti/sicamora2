<!-- Show Post Blade -->

@extends('layouts.app')

@section('title', "| Un Post")

@section('content')

<div class="container">

<div class="row">

  <div class="col-12">

    <div class="card show">

      <div class="card-header">

        <div class="row">

          <div class="col-8">
            <h3 class="subtitle_h3_nolines">{{$post->title}}</h3>
          </div>

          <div class="col-4">

            <div class="col-12">
              <div class="row card-text postbody">
                <dt><dfn>Género:&nbsp</dfn></dt>
                <dd>{{$post->genre->value}}</dd>
              </div>
            </div>
            <div class="col-12">
              <div class="row card-text postbody">
                <dt><dfn>Publicado el:&nbsp</dfn></dt>
                <dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
              </div>
            </div>
            <div class="col-12">
              <div class="row card-text postbody">
                <dt><dfn>Última actualización:&nbsp</dfn></dt>
                <dd> {!!$post->updated_at()!!}</dd>
              </div>
            </div>

              <div class="row">
                @guest <!-- si es guest no muestra los botones de editar y eliminar -->
                  <div class="col-1">
                  </div>
                  <div class="col-4">
                  </div>
                  <div class="col-2">
                  </div>
                  <div class="col-4">
                  </div>
                  <div class="col-1">
                  </div>
                @else <!-- el usuario logueado puede editar y eliminar sus propios posts -->
                  @if($post->user_id == Auth::user()->id)

                    <div class="col-4">
                    {!! Html::linkRoute('posts.edit', 'Editar', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-4">
                      {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                      {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-block']) !!}
                      {!! Form::close()!!}
                    </div>
                    <div class="col-4">
                      {!! Html::linkRoute('posts.index', 'Ver todas mis publicaciones', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
                    </div>

                  @else <!-- el usuario logueado no puede editar ni eliminar posts de otros -->
                    <div class="col-1">
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-1">
                    </div>
                  @endif
              </div>
            @endguest

          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <h4 class="subtitle_h3_nolines"><a href="/blog/{{$post->slug}}">{{ url('blog/'.$post->slug) }}</a></h4>
          </div>
        </div>
      </div> <!-- end of card header -->

      <div class="card-body">
        <p class="card-text postbody" style="text-align: justify">{{$post->body}}</p>
      </div>

        <div class="col-12">
          <div class="card comments">
            <div class="card-header">
              <h3 class="subtitle_h3_nolines">Comentarios</h3>
            </div>
            <div class="card-body">
              <div class="row cardcomments">
              </div>
            </div>
          </div>
        </div>

        <br>

      </div>
  </div>




@endsection
