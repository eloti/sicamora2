<!-- Create Post Blade -->

@extends('layouts.app')

@section('title', "| Create")

@section('content')

<br>

<div class="row">
  <div class="col-8 offset-2">
    <h1>Crear nueva publicación</h1>
    <hr>
      <div class="row">

        <form data-parsley-validate class="col-12" method="POST" action="{{ route('posts.store') }}">
          {{csrf_field()}}

          <div class="form-group">

            <input type="hidden" name="user_id" value="{{$user->id}}" readonly>

            <label for="title" class="col-form-label col-2">Título:</label>
            <input class="form-control col-12" name="title" id="title" type="text" required maxlength="255">

            <!--label for="slug" class="col-form-label col-2">Slug:</label>
            <input class="form-control col-12" name="slug" id="slug" type="text" required minlength="5" maxlength="255"-->

            <label for="genre_id" class="col-form-label col-2">Género:</label>
            <div class="col-md-4">
              <select name="genre_id" required>
                <option value="">Elija un género</option>
                  @foreach($genre as $oneGenre)
                    @if($oneGenre->closed_at == null)
                      <option value="{{$oneGenre->id}}">{{$oneGenre->value}}</option>
                    @endif
                  @endforeach
              </select>
            </div>

            <label for="body" class="col-form-label col-2">Texto:</label>
            <textarea rows="4" class="form-control" name="body" id="body" required></textarea>

          </div>

          <button type="submit" class="btn btn-success">Publicar</button>

        </form>

      </div>

    <hr>
  </div>
</div>

@endsection

@section('scripts')
 {!! Html::script('js/parsley.min.js') !!}
@endsection
