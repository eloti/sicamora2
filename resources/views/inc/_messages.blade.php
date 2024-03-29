@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      <strong>{{$error}}</strong>
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert alert-success">
    <strong>{{session('success')}}</strong>
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
    {{session('error')}}
  </div>
@endif
