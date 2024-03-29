<!-- Index Post Blade -->
<!-- PostsController index() function -->

@extends('layouts.app')

@section('title', "| Mis Posts")

@section('content')

<div class="container">

  <div class="row">

    <div class="col-12">

      @guest
        <div class="subtitle_one">
          <h3 class="subtitle_h3">Mis Publicaciones</h3>
        </div>
      @else
        <div class="subtitle_one_logged">
          <h3 class="subtitle_h3">Mis Publicaciones</h3>
        </div>
      @endguest

      @if (count($user_posts) == 0)

      <br><br>
        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8">
            <h4 style="text-align: center">Usted no ha publicado un aporte en Sicamora</h4>
            <p style="text-align: center">Haga click sobre "Publicar" en la barra de navegación para redactar su primer aporte.</p>
          </div>
          <div class="col-2">
          </div>
        </div>

      @else

      @foreach ($user_posts as $oneUserPost)

      <div class="card welcome">

        <div class="card-header">
          <div class="container-fluid cardheader">
            <div class="row cardheadfoot">
              <div class="col-5" style="padding: 0">
                <p class="headertext">{!!$oneUserPost->created_at()!!} | <bdi class="headertext2">{{$oneUserPost->genre->value}}</bdi></p>
              </div>
              <div class="col-7" style="padding: 0">
                <p class="headertext3">Última edición: {!!$oneUserPost->updated_at()!!}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <h5 class="card-title posttitle">{{$oneUserPost->title}}</h5>
          <h6 class="card-title author">Autor: {{$oneUserPost->user->alias}}</h6>
          <p class="card-text postbody"><?php echo substr($oneUserPost->body, 0, 250)."...";?></p>
        </div>

        <div class="card-footer">
          <div class="container-fluid cardfooter">
            <div class="row cardheadfoot">
              <div class="col-7" style="padding: 0; display: flex; align-items: center">
                <div class="row cardheadfoot" style="width: 100%">
                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-eye" style="color: darkgreen"><bdi class="iconcount">{{$oneUserPost->counter}}</bdi></i>
                  </div>
                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-heart" style="color: darkgreen"><span class="iconcount rating">{{$oneUserPost->average_rating}}</span></i>
                  </div>

                  <script>
                    var ratings = document.querySelectorAll(".rating")
                    ratings.forEach(function(rating){
                    rating.innerText= Number(rating.innerText).toFixed(1)
                    })
                  </script>

                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-comment-alt" style="color: darkgreen"><bdi class="iconcount">{{$oneUserPost->comments}}</bdi></i>
                  </div>
                </div>
              </div>
              <div class="col-5" style="padding: 0; display: flex; justify-content: flex-end">
                <a href="/blog/{{$oneUserPost->slug}}" class="btn buttontype1">Seguir leyendo</a>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- end card welcome -->

      @endforeach
      @endif

    </div>

  </div>

</div>

@endsection
