<!-- Show Post Blade -->

@extends('layouts.app')

@section('title', "| Un Post")

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">

      <div class="card welcome">

        <div class="card-header">
          <div class="container-fluid cardheader">

            <!-- first part of header -->
            <div class="row cardheadfoot">
              <div class="col-5" style="padding: 0">
                <p class="headertext">{!!$post->created_at()!!} | <bdi class="headertext2">{{$post->genre->value}}</bdi></p>
              </div>
              <div class="col-7" style="padding: 0">
                <p class="headertext3">Última edición: {!!$post->updated_at()!!}</p>
              </div>
            </div>
            <!-- end of first part of header -->
            <br>

            <!-- second part of header -->
            <div class="row cardheadfoot">
              @guest <!-- si es guest no muestra los botones de editar, comentar y eliminar -->

                <div class="col-6">
                  <h6 class="subtitle_h3_nolines"><a href="/blog/{{$post->slug}}">{{ url('blog/'.$post->slug) }}</a></h6>
                </div>
                <div class="col-6">
                </div>

              @else <!-- el usuario logueado puede editar y eliminar sus propios posts -->

                  @if($post->user_id == Auth::user()->id)

                    <div class="col-6">
                      <h6 class="subtitle_h3_nolines">url: <a href="/blog/{{$post->slug}}">{{ url('blog/'.$post->slug) }}</a></h6>
                    </div>
                    <div class="col-2">
                    {!! Html::linkRoute('posts.edit', 'Editar', array($post->id), array('class'=>'btn buttontype1')) !!}
                    </div>
                    <div class="col-2">
                      {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                      {!! Form::submit('Eliminar', ['class' => 'btn buttontype1']) !!}
                      {!! Form::close()!!}
                    </div>
                    <div class="col-2">
                      {!! Html::linkRoute('posts.index', 'Ver todas mis publicaciones', array($post->id), array('class'=>'btn buttontype1')) !!}
                    </div>

                  @else <!-- el usuario logueado no puede editar ni eliminar posts de otros pero puede comentar -->

                    <div class="col-6">
                      <h6 class="subtitle_h3_nolines">url: <a href="/blog/{{$post->slug}}">{{ url('blog/'.$post->slug) }}</a></h6>
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-2">
                      <!-- Botón que abre el modal para comentar -->
                        <button type="button" class="btn buttontype1" data-toggle="modal" data-target="#modalCreateComment">Comentar</button>
                    </div>

                  @endif

                @endguest

          </div> <!-- end of second part of header -->

        </div> <!-- end of container fluid for card header -->
      </div> <!-- end of card header -->


      <div class="card-body">

        <h5 class="card-title posttitle">{{$post->title}}</h5>
        <h6 class="card-title author">Autor: {{$post->user->name}}</h6>
        <text class="card-text postbody" style="text-align: justify">{{$post->body}}</text>


        <div class="col-12">
          <div class="card comments">

            <div class="card-header">
              <h5 class="card-title posttitle">Comentarios</h5>
            </div>

            <div class="card-body">
              @foreach ($comments as $oneComment)
                  <div class="card comments"> <!-- card for each individual comment -->

                    <div class="card-header">
                      <h5 class="card-title posttitle">Comentario realizado el: {{$oneComment->created_at}}</h5>
                      <h6 class="card-title author">Comentado por: {{$oneComment->user->name}}</h6>
                    </div>

                    <div class="card-body">
                      <text class="card-text postbody" style="text-align: justify">{{$oneComment->body}}</text>
                    </div>

                    <div class="card-footer">
                      <div class="row cardheadfoot">
                        <div class="col-6">
                          <h6 class="card-title author">Puntaje otorgado: {{$oneComment->rating}}</h6>
                        </div>
                        <div class="col-4">
                        </div>
                        <div class="col-2">
                          @if(Auth::check())
                            <button type="button" class="btn buttontype1" data-toggle="modal" data-target="#modalCreateResponse-{{$oneComment->id}}">Responder</button>
                          @endif
                        </div>
                      </div>
                    </div>

                    <hr>

                    @foreach ($responses as $oneResponse) <!-- Show responses -->
                      @if ($oneResponse->comment_id == $oneComment->id)
                        <div class="col-12">
                          <div class="card responses">

                              <div class="card-header">
                                <h5 class="card-title posttitle">Respuesta realizada el: {{$oneResponse->created_at}}</h5>
                                <h6 class="card-title author">Respondido por: {{$oneResponse->user->name}}</h6>
                              </div>
                              <div class="card-body">
                                <text class="card-text postbody" style="text-align: justify">{{$oneResponse->body}}</text>
                              </div>

                            </div>
                          <br>
                        </div>
                      @endif
                    @endforeach

                  </div> <!-- end of card for each individual comment -->

                  <!-- Respond a comment modal -->
                  @if(Auth::check())
                  <div class="modal" id="modalCreateResponse-{{$oneComment->id}}">
                    <div class="modal-dialog modal-lg">
                      <!-- Modal content-->
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title">Responder a comentario:</h4>
                        </div>

                        <form method="POST" action="{{ route('responses.store') }}">
                          {{csrf_field()}}

                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="form-group row">
                                {{ Form::label("Respuesta:", null, ["class" => "col-form-label col-2"]) }}
                                {{ Form::textarea('body', null, ["class" => 'form-control col-10', 'rows' => 4]) }}
                              </div>
                              <!-- hay que agregar oculto el post_id, user_id (el que hace el comentario) -->
                                <input type="hidden" name="user_id" value="{{$user->id}}" readonly>
                                <input type="hidden" name="post_id" value="{{$post->id}}" readonly>
                                <input type="hidden" name="comment_id" value="{{$oneComment->id}}" readonly>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button class="btn btn-success modalbutton" type="submit">Enviar</button>
                            <button type="button" class="btn btn-success modalbutton" data-dismiss="modal">Cancelar</button>
                          </div>

                        </form>

                      </div>
                    </div>
                  </div> <!-- end modal respond comment -->
                  @endif

                @endforeach
              </div>
            </div>
          </div>
        </div>

      </div> <!-- end of card welcome -->

    </div> <!-- end of main col-12 -->
  </div> <!-- en of main row -->
</div> <!-- end of container -->



<!-- CreateComment modal -->
@if(Auth::check())
<div class="modal" id="modalCreateComment">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Comentar la publicación:</h4>
        <h3>{{$post->title}}</h3>
      </div>

      <form method="POST" action="{{ route('comments.store') }}">
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              {{ Form::label("Comentario:", null, ["class" => "col-form-label col-2"]) }}
              {{ Form::textarea('body', null, ["class" => 'form-control col-10', 'rows' => 4]) }}
            </div>
            <hr>
            <div class="form-group row">

                <div class="col-12" style="text-align: center">
                  <p>Califique la publicación del 1 al 5, siendo 1 "no me gusta" y 5 "me gusta mucho":</p>
                </div>

                <div class="col-12">
                  <div class="row">
                    <div class="col-1">
                      </div>
                        <?php
                          for($points = 1; $points <= 5; $points++) { ?>
                            <div class="col-2" style="text-align: center">
                              <input type="radio" name="rating" value=<?php echo($points)?>>
                            </div>
                        <?php
                        } ?>
                      <div class="col-1">
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="row">
                    <div class="col-1">
                      </div>
                        <?php
                          for($points = 1; $points <= 5; $points++) { ?>
                            <div class="col-2" style="text-align: center">
                              {{$points}}
                            </div>
                        <?php
                        } ?>
                      <div class="col-1">
                    </div>
                  </div>
                </div>

            </div>
              <!-- hay que agregar oculto el post_id, user_id (el que hace el comentario), prev_comment_id == null-->
              <input type="hidden" name="user_id" value="{{$user->id}}" readonly>
              <input type="hidden" name="post_id" value="{{$post->id}}" readonly>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success modalbutton" type="submit">Enviar</button>
          <button type="button" class="btn btn-success modalbutton" data-dismiss="modal">Cancelar</button>
        </div>

      </form>

    </div>
  </div>
</div> <!-- end of CreateComment modal -->
@endif



@endsection
