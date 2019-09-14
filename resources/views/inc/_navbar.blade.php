<div class="container-fluid fixed-top">

<div class="row top-nav-bar" style="background-color: darkgreen">

  <div class="col-8 top-nav-bar" style="display:flex; align-items:center; padding-right: 0px; padding-left: 0px">
    <a class="top-navbar" style="color: white">

    <?php

      $dayname = date("D");
      $month = date("M");
      $daynumber = date("j");
      $year = date("Y");

      if ($dayname == "Sat") {
      $dianombre = "Sábado";}
        elseif ($dayname == "Sun") {
        $dianombre = "Domingo";}
          elseif ($dayname == "Mon") {
          $dianombre = "Lunes";}
            elseif ($dayname == "Tue") {
            $dianombre = "Martes";}
              elseif ($dayname == "Wed") {
              $dianombre = "Miércoles";}
                elseif ($dayname == "Thu") {
                $dianombre = "Jueves";}
                  else {$dianombre = "Viernes";}

      if ($month == "Jan") {
      $mes = "enero";}
        elseif ($month == "Feb") {
        $mes = "febrero";}
          elseif ($month == "Mar") {
          $mes = "marzo";}
            elseif ($month == "Apr") {
            $mes = "abril";}
              elseif ($month == "May") {
              $mes = "mayo";}
                elseif ($month == "Jun") {
                $mes = "junio";}
                  elseif ($month == "Jul") {
                  $mes = "julio";}
                    elseif ($month == "Aug") {
                    $mes = "agosto";}
                      elseif ($month == "Sep") {
                      $mes = "septiembre";}
                        elseif ($month == "Oct") {
                        $mes = "octubre";}
                          elseif ($month == "Nov") {
                          $mes = "noviembre";}
                            else {$mes = "diciembre";}

                echo $dianombre." ".$daynumber." de ".$mes." de ".$year;
      ?>
    </a>
  </div>

  @guest
    <div class="col-2 top-nav-bar" style="text-align: right">
      @if (Route::has('register'))
        <a class="top-navbar" style="color: white" href="{{ route('register') }}">Regístrese</a>
      @endif
    </div>
    <div class="col-2 top-nav-bar" style="text-align: right">
      <a class="top-navbar" style="color: white" href="{{ route('login') }}">Iniciar sesión</a>
    </div>

  @else
    <div class="col-4 top-nav-bar" style="text-align: right; padding-right: 0px; padding-left: 0px">
      <a id="navbarDropdown" style="padding: 0; font-size: 11px; color: white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{Auth::user()->alias}}
        <img src="/storage/uploads/user_images/{{ Auth::user()->user_image }}" style="width: 40px; height: 40px; border-radius: 50%;"><span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: darkgreen; font-size: 13px">

        <a class="dropdown-item" href="/profile" style="color: white">
          {{ __('Ver/Editar Perfil') }}
        </a>

        @if (Auth::user()->xtra_field_1 === 'S')
        <a class="dropdown-item" href="{{ route('admin') }}" style="color: white">
          {{ __('Admin') }}
        </a>
        @endif

        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" style="color: white">
          {{ __('Cerrar sesión') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>

    </div> <!--end of div when there is a logged in user-->
      @endguest

</div> <!--end of div for the top part of the navbar-->

<!-- Main NavBar -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: lightgreen; color: darkgreen; padding-right: 8px; padding-left: 8px; padding-top: 5px; padding-bottom: 5px">

    <a class="navbar-brand" href="{{ url('/') }}" style="color: darkgreen">
      SicaMora
    </a>
    <button class="navbar-toggler" style="align: right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <i class="fas fa-bars" style="color: darkgreen"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
      <div class="navbar-nav" style="font-size: 13px; width: 100%"> <!--class mr-auto removed and originally a ul-->

        @guest
        <div class="container-fluid" style="padding: 0; margin: 0">
          <div class="row" style="margin: 0">

            <div class="{{ Request::is("/") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/" style="color: darkgreen; text-align: center; padding: 0">Publicaciones con mejores comentarios</a>
            </div>

            <div class="{{ Request::is("/most_read") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/most_read" style="color: darkgreen; text-align: center; padding: 0">Publicaciones más leídas</a>
            </div>

            <div class="{{ Request::is("/new_posts") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center; padding: 0">
                <a class="nav-link" href="/new_posts" style="color: darkgreen; text-align: center">Publicaciones recientes</a>
            </div>

            <div class="nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/authors" style="color: darkgreen; text-align: center; padding: 0">Autores</a>
            </div>

            <div class="{{ Request::is("about") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/about" style="color: darkgreen; text-align: center; padding: 0">Acerca de</a>
            </div>

            <div class="{{ Request::is("faq") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/faq" style="color: darkgreen; text-align: center; padding: 0">Preguntas</a>
            </div>

            <!--div class="{{ Request::is("contact") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/contact" style="color: darkgreen; text-align: center">Contacto</a>
            </div-->

          </div>
        </div>

        @else
        <div class="container" style="padding: 0; margin: 0; width: 100%">
          <div class="row" style="margin: 0">
            <div class="{{ Request::is("/") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-1" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/my_reads" style="color: darkgreen; text-align: center">Mis lecturas</a>
            </div>
            <div class="nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/posts" style="color: darkgreen; text-align: center; padding: 0">Mis publicaciones</a>
            </div>
            <div class="nav-item col-12 col-sm-1" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/posts/create" style="color: darkgreen; text-align: center; padding: 0">Publicar</a>
            </div>
            <div class="{{ Request::is("/") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/" style="color: darkgreen; text-align: center; padding: 0">Publicaciones con mejores comentarios</a>
            </div>
            <div class="{{ Request::is("/most_read") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/most_read" style="color: darkgreen; text-align: center; padding: 0">Publicaciones más leídas</a>
            </div>
            <div class="{{ Request::is("/new_posts") ? "itemmenuactivo" : "" }} nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/new_posts" style="color: darkgreen; text-align: center; padding: 0">Publicaciones recientes</a>
            </div>
            <div class="nav-item col-12 col-sm-2" style="padding: 0; display: flex; align-items: center; justify-content: center">
                <a class="nav-link" href="/authors" style="color: darkgreen; text-align: center; padding: 0">Autores</a>
            </div>
          </div>
        </div>

        @endguest

      </div>

    </div>
</nav>
</div>
