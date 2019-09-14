<!-- Welcome blade, muestra todas la publicaciones, la idea es ordenarlas por popularidad
Una visita accede clickeando "Inicio" en el navbar
El controlador es PagesController.php -->

@extends('layouts.app')

@section('title', "| Mis lecturas")

@section('content')

<div class="container">

  <div class="row">

    <div class="col-12">

      <div class="subtitle_one">
        <h3 class="subtitle_h3">Mis Lecturas</h3>
      </div>

      @if (count($all_post) == 0)

      <br><br>
        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8">
            <h4 style="text-align: center">Usted no ha seleccionado publicaciones para agregar a "Mis Lecturas"</h4>
            <p>Explore el sitio mediante la barra de navegación. Al ingresar a publicaciones para leer, podrá agregar las de su interes haciendo click en "Agregar a Mis Lecturas".</p>
          </div>
          <div class="col-2">
          </div>
        </div>

      @else

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
          <h6 class="card-title author">Autor: {{$onePost->user->alias}}</h6>
          <p class="card-text postbody"><?php echo substr($onePost->body, 0, 250)."...";?></p>
        </div>

        <div class="card-footer">
          <div class="container-fluid cardfooter">
            <div class="row cardheadfoot">
              <div class="col-9" style="padding: 0; display: flex; align-items: center">
                <div class="row cardheadfoot" style="width: 100%">

                  <div class="col-3" style="padding: 0">
                    <i class="fas fa-eye" style="color: darkgreen"><bdi class="iconcount"> {{$onePost->counter}} </bdi></i>
                  </div>

                  <div class="col-3" style="padding: 0">
                    <i class="fas fa-heart" style="color: darkgreen"><span class="iconcount rating" id="avg_rating"> {{$onePost->average_rating}}</span></i>

                    <script>
                      var ratings = document.querySelectorAll(".rating")
                      ratings.forEach(function(rating){
                      rating.innerText= Number(rating.innerText).toFixed(1)
                      })
                    </script>
                  </div>

                  <div class="col-3" style="padding: 0">
                    <i class="fas fa-comment-alt" style="color: darkgreen"><bdi class="iconcount"> {{$onePost->comments}}</bdi></i>
                  </div>

                  <div class="col-3" style="padding: 0">
                    @foreach ($user_reads as $one_user_read)
                      @if ($one_user_read->post_id === $onePost->id)
                        <i class="fas fa-bookmark" style="color: darkgreen"><bdi class="iconcount"> {{"Mis Lecturas"}}</bdi></i>
                      @endif
                    @endforeach
                  </div>

                </div>
              </div>

              <div class="col-3" style="padding: 0; display: flex; justify-content: flex-end">
                <a href="/blog/{{$onePost->slug}}" class="btn buttontype1">Seguir leyendo</a>
              </div>

            </div>
          </div>
        </div>

      </div> <!-- end card welcome -->

      @endforeach
      @endif

    </div> <!-- end of showing posts -->

  </div> <!-- end of row -->

</div> <!-- end of container -->

@endsection
