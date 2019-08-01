<!-- Index Post Blade -->

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
          <h6 class="card-title author">Autor: {{$oneUserPost->user->name}}</h6>
          <p class="card-text postbody"><?php echo substr($oneUserPost->body, 0, 250)."...";?></p>
        </div>

        <div class="card-footer">
          <div class="container-fluid cardfooter">
            <div class="row cardheadfoot">
              <div class="col-7" style="padding: 0; display: flex; align-items: center">
                <div class="row cardheadfoot" style="width: 100%">
                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-eye" style="color: darkgreen"><bdi class="iconcount"> 10</bdi></i>
                  </div>
                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-heart" style="color: darkgreen"><bdi class="iconcount"> 6</bdi></i>
                  </div>
                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-comment-alt" style="color: darkgreen"><bdi class="iconcount"> 505</bdi></i>
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

    </div>

  </div>

</div>

@endsection
