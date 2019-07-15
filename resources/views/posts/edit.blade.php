<!-- Edit Post Blade -->

@extends('layouts.app')

@section('title', "| Edit")

@section('content')

<br>

<div class="row">
  <div class="col-8 offset-2">
    <h1>Edite su publicación</h1>
    <hr>
      <div class="row">

        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'class' => "col-12"]) !!}

          <div class="form-group">

            <input type="hidden" name="user_id" value="{{$user->id}}" readonly>

            {{ Form::label("Título:", null, ["class" => "col-form-label col-2"])}}
            {{ Form::text('title', null, ["class" => 'form-control']) }}
            <!--label for="title" class="col-form-label col-2">Título:</label>
            <input class="form-control col-12" name="title" id="title" type="text" required maxlength="191"-->

            {{ Form::label("Género:", null, ["class" => "col-form-label col-2"])}}

            <label for="genre_id" class="col-form-label col-2">Género:</label>

            <div class="col-md-4">
              <select name="genre_id" required>
                @foreach($genre as $oneGenre)
                  @if($post->genre_id == $oneGenre->id)
                    <option selected value="{{$oneGenre->id}}">{{$oneGenre->value}}</option>
                  @else
                    <option value="{{$oneGenre->id}}">{{$oneGenre->value}}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <!--div class="col-md-4">
              <select name="genre_id" required>
                <option value="">Elija un género</option>
                  @foreach($genre as $oneGenre)
                    <option value="{{$oneGenre->id}}">{{$oneGenre->value}}</option>
                  @endforeach
              </select>
            </div-->

            {{ Form::label("Texto:", null, ["class" => "col-form-label col-2"])}}
            {{ Form::textarea('body', null, ["class" => 'form-control'] )}}

            <!--label for="body" class="col-form-label col-2">Texto:</label>
            <textarea rows="4" class="form-control" name="body" id="body" required></textarea-->

          </div>
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-4">
              {!! Html::linkRoute('posts.show', 'Cancelar', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
            </div>
            <div class="col-4">
              {{ Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-block'])}}
            </div>
            <div class="col-2">
            </div>
          </div>
          {!! Form::close() !!}

      </div>

    <hr>
  </div>
</div>

@endsection

@section('scripts')
 {!! Html::script('js/parsley.min.js') !!}
@endsection
