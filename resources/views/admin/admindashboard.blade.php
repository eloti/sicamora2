<!-- Admin Dashboard Blade -->

@extends('layouts.app')

@section('title', "| Admin")

@section('content')

<br><br><br><br><br><br><br><br>

<div class="row"> <!-- Tabla de géneros -->
  <div class="col-8 offset-2">

    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col-1">
            <p>ID</p>
          </div>
          <div class="col-5">
            <p>Género</p>
          </div>
          <div class="col-3">
            <p>Status</p>
          </div>
          <div class="col-3">
            <p>Editar</p>
          </div>
        </div>
      </div>
    </div>

    @foreach ($genres as $oneGenre)
    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col-1">
            {{$oneGenre->id}}
          </div>
          <div class="col-5">
            {{$oneGenre->value}}
          </div>
            @if($oneGenre->closed_at == null)
              <div class="col-3">
                Activo
              </div>
              <div class="col-3">
                <a class="btn btn-primary" data-toggle="modal" data-target="#modalEditGenre-{{ $oneGenre->id }}">Editar género</a>
              </div>
            @else
              <div class="col-3">
                Cerrado
              </div>
              <div class="col-3">
                --
              </div>
            @endif
          </div>
        </div>
      </div>
      @endforeach
      <a class="btn btn-success" data-toggle="modal" data-target="#modalAddGenre">Agregar género</a>
    </div>
    <br>
  </div>

<hr>

<!-- Modal de editar género -->
<!--@foreach ($genres as $oneGenre)-->
<!--div class="modal fade" id="modalEditGenre-{{ $oneGenre->id }}" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <!--div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Editar Género</h4>
      </div>

      <form method="POST" action="/genres/{{$oneGenre->id}}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="id" class="col-4 col-form-label">ID:</label>
              <input class="col-4 form-control" type="text" value="{{$oneGenre->id}}" readonly>
            </div>
            <div class="form-group row">
              <label for="id" class="col-4 col-form-label">Género:</label>
              <input class="col-4 form-control" type="text" value="{{$oneGenre->value}}" readonly>
            </div>
            <div class="form-group row">
              <label for="id" class="col-4 col-form-label">Descripción:</label>
              <input class="col-4 form-control" type="textarea" value="{{$oneGenre->description}}">
            </div>
          </div>
        </div>

        <div class="modal-footer">

          <button class="action_button" type="submit">Editar</button>
          <input class="action_button" id="close_button" type="submit" name="closed_at" value="Cerrar género" onclick="changeCloseButton()">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>
</div>
<!--@endforeach-->




<!-- Modal de agregar género -->

<br>
<div class="modal fade" id="modalAddGenre" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Agregar Género</h4>
      </div>

      <form method="POST" action="{{ route('genres.store') }}">
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="value" class="col-4 col-form-label">Género:</label>
              <input class="col-4 form-control" name="value" id="value" type="text">
            </div>
            <div class="form-group row">
              <label for="description" class="col-4 col-form-label">Descripción:</label>
              <input class="col-4 form-control" name="description" id="description" type="textarea">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="action_button" type="submit">Agregar</button>
          <input class="action_button" id="close_button" type="submit" name="closed_at" value="Cerrar género" onclick="changeCloseButton()">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>



      </form>

    </div>
  </div>
</div> <!-- end modal add genre -->


    <div class="row">
      <div class="col-8 offset-2">

        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-1">
                <p>ID</p>
              </div>
              <div class="col-2">
                <p>Consigna</p>
              </div>
              <div class="col-3">
                <p>Descripción</p>
              </div>
              <div class="col-2">
                <p>Creado</p>
              </div>
              <div class="col-2">
                <p>Cerrado</p>
              </div>
              <div class="col-2">
                <p>Editar</p>
              </div>
            </div>
          </div>
        </div>

    <br>

    @foreach ($assignments as $oneAssignment)

        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-1">
                {{$oneAssignment->id}}
              </div>
              <div class="col-2">
                {{$oneAssignment->title}}
              </div>
              <div class="col-3">
                {{$oneAssignment->description}}
              </div>
              <div class="col-2">
                {!!$oneAssignment->created_at()!!}
              </div>
              @if ($oneAssignment->closed_at == null)
              <div class="col-2">
                <a class="btn btn-success" data-toggle="modal" data-target="/">Cerrar consigna</a>
              </div>
              <div class="col-2">
                <a class="btn btn-success" data-toggle="modal" data-target="/">Modificar consigna</a>
              </div>
              @else
              <div class="col-2">
                {!!$oneAssignment->closed_at()!!}
              </div>
              <div class="col-2">
              </div>
              @endif
            </div>
          </div>
        </div>
    @endforeach
      <a class="btn btn-success" data-toggle="modal" data-target="/">Agregar consigna</a>
  </div>
</div>

<hr>

@endsection

@section('scripts')

<script>
  function changeCloseButton() {
    document.getElementById("close_button").value = "{{$myTime}}";
  }
</script>

@endsection
