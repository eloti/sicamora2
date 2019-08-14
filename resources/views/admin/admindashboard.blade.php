<!-- Welcome blade, muestra todas la publicaciones, la idea es ordenarlas por popularidad
Una visita accede clickeando "Inicio" en el navbar
El controlador es PagesController.php -->

@extends('layouts.app')

@section('title', "| Admin")

@section('content')

<div class="container">

  <div class="row">

    <div class="col-12">

      <div class="subtitle_one">
        <h3 class="subtitle_h3">Tablero de Administración</h3>
      </div>

<br>

<div class="row">

  <div class="col-6"> <!-- Tabla de géneros -->

    <div class="row">
      <div class="col-12">
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
            <p></p>
          </div>
        </div>
      </div>
    </div>

    @foreach ($genres as $oneGenre)
    <div class="row" style="padding-bottom: 3px">
      <div class="col-12">
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
            @else
              <div class="col-3">
                Cerrado
              </div>
            @endif
            <div class="col-3">
              <button class="btn buttontype1" data-toggle="modal" data-target="#modalEditGenre-{{ $oneGenre->id }}">Editar género</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-12" style="text-align: center">
        <button class="btn buttontype1" data-toggle="modal" data-target="#modalAddGenre">Agregar género</button>
      </div>
    </div> <!-- Fin de tabla de géneros -->

    <div class="col-6"> <!-- Tabla de idiomas -->

      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-1">
              <p>ID</p>
            </div>
            <div class="col-5">
              <p>Idioma</p>
            </div>
            <div class="col-3">
              <p>Status</p>
            </div>
            <div class="col-3">
              <p></p>
            </div>
          </div>
        </div>
      </div>

      @foreach ($languages as $oneLanguage)
      <div class="row" style="padding-bottom: 3px">
        <div class="col-12">
          <div class="row">
            <div class="col-1">
              {{$oneLanguage->id}}
            </div>
            <div class="col-5">
              {{$oneLanguage->value}}
            </div>
              @if($oneLanguage->closed_at == null)
                <div class="col-3">
                  Activo
                </div>
              @else
                <div class="col-3">
                  Cerrado
                </div>
              @endif
              <div class="col-3">
                <button class="btn buttontype1" data-toggle="modal" data-target="#modalEditLanguage-{{ $oneLanguage->id }}">Editar idioma</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-12" style="text-align: center">
          <button class="btn buttontype1" data-toggle="modal" data-target="#modalAddLanguage">Agregar idioma</button>
        </div>
      </div> <!-- Fin de tabla de idiomas -->

  </div> <!-- End of first row -->

<hr>

<!-- Modal de editar género -->
@foreach ($genres as $oneGenre)
<div class="modal fade" id="modalEditGenre-{{ $oneGenre->id }}" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Editar Género</h4>
      </div>

      <form method="POST" action="/genres/{{ $oneGenre->id }}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="id" class="col-4 col-form-label">ID:</label>
              <input name="id" class="col-4 form-control" type="text" value="{{$oneGenre->id}}" readonly>
            </div>
            <div class="form-group row">
              <label for="value" class="col-4 col-form-label">Género:</label>
              <input name="value" class="col-4 form-control" type="text" value="{{$oneGenre->value}}" readonly>
            </div>
            <div class="form-group row">
              <label for="description" class="col-4 col-form-label">Descripción:</label>
              <input name="description" class="col-4 form-control" type="textarea" value="{{$oneGenre->description}}">
            </div>

            <div class="form-group row">
              {!! Form::label('close_flag', 'Status: ', ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, col-form-label']) !!}
                <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 radio_buttons_div" style="text-align: center">
                  @if($oneGenre->closed_at !== null)
                    {!! Form::radio('close_flag', 0 , true) !!}<span class=radio_label> {{'Cerrar'}}</span>
                  @else
                    {!! Form::radio('close_flag', 0) !!}<span class=radio_label> {{'Cerrar'}}</span>
                  @endif
                </div>
                <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 radio_buttons_div" style="text-align: center">
                  @if($oneGenre->closed_at == null)
                    {!! Form::radio('close_flag', 1, true) !!}<span class=radio_label> {{'Activar'}}</span>
                  @else
                    {!! Form::radio('close_flag', 1) !!}<span class=radio_label> {{'Activar'}}</span>
                  @endif
                </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button class="btn buttontype1" type="submit">Guardar cambios</button>
          <button type="button" class="btn buttontype1" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>

</div> <!-- Fin del modal de editar género -->
@endforeach


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
              {{ Form::label("Género:", null, ["class" => "col-form-label col-2"])}}
              {{ Form::text('value', null, ["class" => 'form-control col-6'] )}}
            </div>
            <div class="form-group row">
              {{ Form::label("Descripción:", null, ["class" => "col-form-label col-2"])}}
              {{ Form::textarea('description', null, ["class" => 'form-control col-10', 'rows' => 4] )}}
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success modalbutton" type="submit">Agregar</button>
          <button type="button" class="btn btn-success modalbutton" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>
</div> <!-- end modal add genre -->


<!-- Modal de editar idioma -->
@foreach ($languages as $oneLanguage)
<div class="modal fade" id="modalEditLanguage-{{ $oneLanguage->id }}" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Editar Idioma</h4>
      </div>

      <form method="POST" action="/languages/{{ $oneLanguage->id }}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="id" class="col-4 col-form-label">ID:</label>
              <input name="id" class="col-4 form-control" type="text" value="{{$oneLanguage->id}}" readonly>
            </div>
            <div class="form-group row">
              <label for="value" class="col-4 col-form-label">Género:</label>
              <input name="value" class="col-4 form-control" type="text" value="{{$oneLanguage->value}}" readonly>
            </div>

            <div class="form-group row">
              {!! Form::label('close_flag', 'Status: ', ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, col-form-label']) !!}
                <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 radio_buttons_div" style="text-align: center">
                  @if($oneLanguage->closed_at !== null)
                    {!! Form::radio('close_flag', 0 , true) !!}<span class=radio_label> {{'Cerrar'}}</span>
                  @else
                    {!! Form::radio('close_flag', 0) !!}<span class=radio_label> {{'Cerrar'}}</span>
                  @endif
                </div>
                <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 radio_buttons_div" style="text-align: center">
                  @if($oneLanguage->closed_at == null)
                    {!! Form::radio('close_flag', 1, true) !!}<span class=radio_label> {{'Activar'}}</span>
                  @else
                    {!! Form::radio('close_flag', 1) !!}<span class=radio_label> {{'Activar'}}</span>
                  @endif
                </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button class="btn buttontype1" type="submit">Guardar cambios</button>
          <button type="button" class="btn buttontype1" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>

</div> <!-- Fin del modal de editar idioma -->
@endforeach


<!-- Modal de agregar idioma -->
<br>
<div class="modal fade" id="modalAddLanguage" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Agregar Idioma</h4>
      </div>

      <form method="POST" action="{{ route('languages.store') }}">
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              {{ Form::label("Idioma:", null, ["class" => "col-form-label col-2"])}}
              {{ Form::text('value', null, ["class" => 'form-control col-6'] )}}
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success modalbutton" type="submit">Agregar</button>
          <button type="button" class="btn btn-success modalbutton" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>
</div> <!-- end modal add language -->



    <div class="row"> <!-- assignments row -->
      <div class="col-8 offset-2">

        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-1">
                <p>ID</p>
              </div>
              <div class="col-3">
                <p>Consigna</p>
              </div>
              <div class="col-2">
                <p>Creado</p>
              </div>
              <div class="col-2">
                <p>Cerrado</p>
              </div>
              <div class="col-2">
                <p>Status</p>
              </div>
              <div class="col-2">
              </div>
            </div>
          </div>
        </div>

    <br>

    @foreach ($assignments as $oneAssignment)

        <div class="row" style="padding-bottom: 3px">
          <div class="col-12">
            <div class="row">
              <div class="col-1">
                {{$oneAssignment->id}}
              </div>
              <div class="col-3">
                {{$oneAssignment->title}}
              </div>
              <div class="col-2">
                {!!$oneAssignment->created_at()!!}
              </div>
              <div class="col-2">
                @if($oneAssignment->closed_at !== null)
                  {!!$oneAssignment->closed_at()!!}
                @endif
              </div>
              <div class="col-2">
                @if($oneAssignment->closed_at == null)
                  {{'Activo'}}
                @else
                  {{'Cerrado'}}
                @endif
              </div>
              <div class="col-2">
                <button class="btn buttontype1" data-toggle="modal" data-target="#modalEditAssignment-{{ $oneAssignment->id }}">Editar consigna</button>
              </div>

            </div>
          </div>
        </div>
    @endforeach
    <div class="col-12" style="text-align: center">
      <button class="btn buttontype1" data-toggle="modal" data-target="#modalAddAssignment">Agregar consigna</button>
    </div>
  </div>
</div>

<!-- Modal de agregar consigna -->
<br>
<div class="modal fade" id="modalAddAssignment" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Agregar Consigna</h4>
      </div>

      <form method="POST" action="{{ route('assignments.store') }}">
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              {{ Form::label("Consigna:", null, ["class" => "col-form-label col-2"])}}
              {{ Form::text('title', null, ["class" => 'form-control col-6'] )}}
            </div>
            <div class="form-group row">
              {{ Form::label("Descripción:", null, ["class" => "col-form-label col-2"])}}
              {{ Form::textarea('description', null, ["class" => 'form-control col-10', 'rows' => 4] )}}
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success modalbutton" type="submit">Agregar</button>
          <button type="button" class="btn btn-success modalbutton" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>
</div> <!-- end modal add assignment -->

<!-- Modal de editar consigna -->
@foreach ($assignments as $oneAssignment)
<div class="modal fade" id="modalEditAssignment-{{ $oneAssignment->id }}" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Editar Consigna</h4>
      </div>

      <form method="POST" action="/assignments/{{ $oneAssignment->id }}">
        {{method_field('PUT')}}
        {{csrf_field()}}

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group row">
              <label for="id" class="col-4 col-form-label">ID:</label>
              <input name="id" class="col-4 form-control" type="text" value="{{$oneAssignment->id}}" readonly>
            </div>
            <div class="form-group row">
              <label for="title" class="col-4 col-form-label">Consigna:</label>
              <input name="title" class="col-4 form-control" type="text" value="{{$oneAssignment->title}}" readonly>
            </div>
            <div class="form-group row">
              {{ Form::label("Descripción:", null, ["class" => "col-form-label col-4"])}}
              {{ Form::textarea('description', $oneAssignment->description, ["class" => 'form-control col-8', 'rows' => 4] )}}
            </div>

            <div class="form-group row">
              {!! Form::label('close_flag', 'Status: ', ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, col-form-label']) !!}
                <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 radio_buttons_div" style="text-align: center">
                  @if($oneAssignment->closed_at !== null)
                    {!! Form::radio('close_flag', 0 , true) !!}<span class=radio_label> {{'Cerrar'}}</span>
                  @else
                    {!! Form::radio('close_flag', 0) !!}<span class=radio_label> {{'Cerrar'}}</span>
                  @endif
                </div>
                <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 radio_buttons_div" style="text-align: center">
                  @if($oneAssignment->closed_at == null)
                    {!! Form::radio('close_flag', 1, true) !!}<span class=radio_label> {{'Activar'}}</span>
                  @else
                    {!! Form::radio('close_flag', 1) !!}<span class=radio_label> {{'Activar'}}</span>
                  @endif
                </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button class="btn buttontype1" type="submit">Guardar cambios</button>
          <button type="button" class="btn buttontype1" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>

</div> <!-- Fin del modal de editar consigna -->
@endforeach





<hr>

</div> <!-- end of tablero -->
</div> <!-- end of row -->
</div> <!-- end of container -->

@endsection

@section('scripts')

@endsection
