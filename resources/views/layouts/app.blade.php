<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    @include('inc._head')
  </head>

  <body>
    @include('inc._navbar')

    <br>
      <br>
        <br>
          <br>
            <br>

      <main>
        @include('inc._messages')
        @yield('content')
      </main>

    @include('inc._footer')
    @include('inc._javascript')
    @yield('scripts')
  </body>

</html>
