<!-- Welcome blade, muestra todas la publicaciones, la idea es ordenarlas por popularidad
Una visita accede clickeando "Inicio" en el navbar
El controlador es PagesController.php -->

@extends('layouts.app')

@section('title', "| Bienvenido")

@section('content')

<div class="container">

  <div class="row">

    <div class="col-12">

      <div class="subtitle_one">
        <h3 class="subtitle_h3">Publicaciones populares</h3>
      </div>

      @foreach ($all_post as $onePost) <!-- el controlador está en PagesController.php -->

      <div class="card welcome">

        <div class="card-header">
          <div class="container-fluid cardheader">
            <div class="row cardheadfoot">
              <div class="col-5" style="padding: 0">
                <p class="headertext">{!!$onePost->created_at()!!} | <bdi class="headertext2">{{$onePost->genre->value}}</bdi></p>
              </div>
              <div class="col-7" style="padding: 0">
                <p class="headertext3">Última edición: {!!$onePost->updated_at()!!}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <h5 class="card-title posttitle">{{$onePost->title}}</h5>
          <h6 class="card-title author">Autor: {{$onePost->user->name}}</h6>
          <p class="card-text postbody"><?php echo substr($onePost->body, 0, 250)."...";?></p>
        </div>

        <div class="card-footer">
          <div class="container-fluid cardfooter">
            <div class="row cardheadfoot">
              <div class="col-7" style="padding: 0; display: flex; align-items: center">
                <div class="row cardheadfoot" style="width: 100%">
                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-eye" style="color: darkgreen"><bdi class="iconcount"> {{$onePost->counter}} </bdi></i>
                  </div>

                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-heart" style="color: darkgreen"><span class="iconcount rating" id="avg_rating"> {{$onePost->average_rating}}</span></i>

                    <script>
                      var ratings = document.querySelectorAll(".rating")
                      ratings.forEach(function(rating){
                      rating.innerText= Number(rating.innerText).toFixed(1)
                      })
                    </script>

                  </div>

                  <div class="col-4" style="padding: 0">
                    <i class="fas fa-comment-alt" style="color: darkgreen"><bdi class="iconcount"> {{$onePost->comments}}</bdi></i>
                  </div>
                </div>
              </div>
              <div class="col-5" style="padding: 0; display: flex; justify-content: flex-end">
                <a href="/blog/{{$onePost->slug}}" class="btn buttontype1">Seguir leyendo</a>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- end card welcome -->

      @endforeach

       <!-- for the pagination -->
       <div class="paginationbuttons" style="margin-top: 10px; display: flex; justify-content: center">
         {{$all_post->links()}} <!-- for the pagination -->
       </div>
       <div style="margin-top: 10px; display: flex; justify-content: center">
         Mostrando página {{$all_post->currentPage()}} de {{$all_post->lastPage()}}
       </div>


    </div> <!-- end of showing posts -->

  </div> <!-- end of row -->

</div> <!-- end of container -->

<br>

@endsection

<!--@section('scripts')

  <script>

  var ratings = document.querySelectorAll(".rating")
    ratings.forEach(function(rating){
        rating.innerText= Number(rating.innerText).toFixed(1)
    })
  </script>



@endsection
