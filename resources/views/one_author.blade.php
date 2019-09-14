<!-- Welcome blade, muestra todas la publicaciones, la idea es ordenarlas por popularidad
Una visita accede clickeando "Inicio" en el navbar
El controlador es PagesController.php -->

@extends('layouts.app')

@section('title', "| Bienvenido")

@section('content')

<br>

<div class="container">

    <h2 class="mainsubtitle">Página de autor</h2>

</div>

<br>

<div class="container">

  <div class="row">

    <div class="col-12">


        <div class="row">

          <div class="card col-4">

            <div class="card-header" style="margin-top: 6px">
              <div class="row">
                <h3 class="mainsubtitle col-10">{{$oneAuthor->alias}}</h3>
                <div class="col-2">
                  @if($oneAuthor->user_image == !null & $oneAuthor->priv_user_image == 0)
                    <img src="/storage/uploads/user_images/{{ $oneAuthor->user_image }}" style="width: 40px; height: 40px; border-radius: 50%;">
                  @endif
                </div>
              </div>
            </div>

            <div class="card-body">
              @if($oneAuthor->name == !null & $oneAuthor->priv_name == 0)
                <label>Nombre:</label>
                <span>{{$oneAuthor->name}}</span>
              <br>
              @endif
              @if($oneAuthor->created_at == !null & $oneAuthor->priv_created_at == 0)
                <label>En Sicamora desde:</label>
                <span>{{$oneAuthor->created_at()}} ({{$myTime->diffInYears($oneAuthor->created_at)." años"}})</span>
              <br>
              @endif
              @if($oneAuthor->email == !null & $oneAuthor->priv_email == 0)
                <label>Email:</label>
                <span>{{$oneAuthor->email}}</span>
              <br>
              @endif
              @if($oneAuthor->birth == !null & $oneAuthor->priv_birth == 0)
                <label>Edad:</label>
                <span>{{$myTime->diffInYears($oneAuthor->birth)." años"}}</span>
              <br>
              @endif
              @if($oneAuthor->gender == !null & $oneAuthor->priv_gender == 0)
                <label>Género:</label>
                <span>{{$oneAuthor->gender}}</span>
              <br>
              @endif

              @if(count($oneAuthor->language)>0)
                <label>Idiomas:</label>
                  @foreach($oneAuthor->language->sortBy('value') as $language)
                    <span>{{$language->value}} / </span>
                  @endforeach
              <br>
              @endif

              @if($oneAuthor->city == !null & $oneAuthor->priv_city == 0)
                <label>Ciudad:</label>
                <span>{{$oneAuthor->city}}</span>
              <br>
              @endif
              @if($oneAuthor->province_state == !null & $oneAuthor->priv_province_state == 0)
                <label>Provincia/Estado:</label>
                <span>{{$oneAuthor->province_state}}</span>
              <br>
              @endif
              @if($oneAuthor->country == !null & $oneAuthor->priv_country == 0)
                <label>País:</label>
                <span>{{$oneAuthor->country}}</span>
              <br>
              @endif
              @if($oneAuthor->about == !null & $oneAuthor->priv_about == 0)
                <label>Acerca de mi:</label>
                <span>{{$oneAuthor->about}}</span>
              <br>
              @endif
            </div>

            <div class="card-footer" style="margin-bottom: 6px">
              <div class="row">
                <div class="col-3"></div>
                <a class="btn buttontype1 col-6" href="/authors">Volver a Autores</a>
                <div class="col-3"></div>
              </div>
            </div>

          </div> <!-- end of author card -->

          <div class="card col-8"> <!-- beginning of author's posts card -->

            <div class="card-header" style="margin-top: 6px">
              <h3 class="mainsubtitle">Publicaciones de {{$oneAuthor->alias}}</h3>
            </div>

            @foreach($authorsPosts as $oneAuthorsPost)
            <div class="card-body">

                <div class="card col-12"> <!-- beginning of sub-card -->

                  <div class="card-header" style="margin-top: 6px">
                    <div class="container-fluid cardheader">
                      <div class="row cardheadfoot">
                        <div class="col-5" style="padding: 0">
                          <p class="headertext">{!!$oneAuthorsPost->created_at()!!} | <bdi class="headertext2">{{$oneAuthorsPost->genre->value}}</bdi></p>
                        </div>
                        <div class="col-7" style="padding: 0">
                          <p class="headertext3">Última edición: {!!$oneAuthorsPost->updated_at()!!}</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title posttitle">{{$oneAuthorsPost->title}}</h5>
                    <p class="card-text postbody"><?php echo substr($oneAuthorsPost->body, 0, 250)."...";?></p>
                  </div>

                  <div class="card-footer" style="margin-bottom: 6px">
                    <div class="container-fluid cardfooter">
                      <div class="row cardheadfoot">
                        <div class="col-9" style="padding: 0; display: flex; align-items: center">
                          <div class="row cardheadfoot" style="width: 100%">

                            <div class="col-4" style="padding: 0">
                              <i class="fas fa-eye" style="color: darkgreen"><bdi class="iconcount"> {{$oneAuthorsPost->counter}} </bdi></i>
                            </div>

                            @foreach($comments_and_rating as $one_comments_and_rating)
                              @if($one_comments_and_rating->post_id == $oneAuthorsPost->id)
                                <div class="col-4" style="padding: 0">
                                  <i class="fas fa-heart" style="color: darkgreen"><span class="iconcount rating" id="avg_rating"> {{$one_comments_and_rating->average_rating}}</span></i>

                                  <script>
                                    var ratings = document.querySelectorAll(".rating")
                                    ratings.forEach(function(rating){
                                    rating.innerText= Number(rating.innerText).toFixed(1)
                                    })
                                  </script>

                                </div>

                                <div class="col-4" style="padding: 0">
                                  <i class="fas fa-comment-alt" style="color: darkgreen"><bdi class="iconcount"> {{$one_comments_and_rating->comments}}</bdi></i>
                                </div>

                              @endif
                            @endforeach

                          </div>
                        </div>

                        <div class="col-3" style="padding: 0; display: flex; justify-content: flex-end">
                          <a href="/blog/{{$oneAuthorsPost->slug}}" class="btn buttontype1">Seguir leyendo</a>
                        </div>

                      </div>
                    </div>
                  </div> <!-- end of card footer -->

                </div> <!-- end of sub-card -->
              </div> <!-- end of author's posts card body -->
              @endforeach
            </div> <!-- end of author's posts card -->

          </div> <!-- end of row -->
        </div> <!-- end of col-12 -->
      </div> <!-- end of row -->
    </div> <!-- end of container -->

@endsection
