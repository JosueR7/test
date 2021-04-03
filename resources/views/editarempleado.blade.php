
@extends('template')

@section('title', 'Crear empleado')

@section('content')
<div class="container">
    <div class="row">
        <h1>@yield('title')</h1>
    </div>
    <div class="row">
        <form class="m-2 needs-validation" method="post" action="/">
            {{ csrf_field() }}

            <div class="row m-2">
              <div class="col-3 text-end">
                <label for="nombre">Nombre Completo *</label>
              </div>
              <div class="col-9">
                <input class="form-control" value="{{$empleado->nombre}}" type="text" name="nombre" id="nombre" placeholder="Nombre completo del empleado" required="required">
              </div>
            </div>

            <div class="row m-2">
              <div class="col-3 text-end">
                <label for="email">Correo electrónico *</label>
              </div>
              <div class="col-9">
                <input class="form-control" value="{{$empleado->email}}" type="email" name="email" id="email" placeholder="Correo electrónico" required="required">
              </div>
            </div>

            <div class="row m-2">
              <div class="col-3 text-end">
                <label for="sexo">Sexo *</label>
              </div>
              <div class="col-9">
                <div class="d-block">
                  <div class="custom-control custom-radio">
                    <input id="male" name="sexo" type="radio" class="form-check-input" value="M" required>
                    <label class="custom-control-label" for="male">Masculino</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input id="female" name="sexo" type="radio" class="form-check-input" value="F" required>
                    <label class="custom-control-label" for="female">Femenino</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="row m-2">
              <div class="col-3 text-end">
                <label>Área *</label>
              </div>
              <div class="col-9">
                <select class="form-select" name="area_id">
                    @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach

                </select>
              </div>
            </div>

            <div class="row m-2">
              <div class="col-3 text-end">
                <label for="descripcion">Descripción *</label>
              </div>
               <div class="col 9">
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado">{{$empleado->descripcion}}</textarea>
               </div>
            </div>

            <div class="row m-2">
              <div class="col-3"></div>
              <div class="col-9">
                <input class="form-check-input" type="checkbox" name="boletin" id="boletin" value="1">
                <label for="boletin">Deseo recibir boletin informativo</label>
              </div>
            </div>

            <div class="row m-2">
              <div class="col-3 text-end">
                <label for="rol">Roles *</label>
              </div>
              <div class="col 9">
                <div class="d-block">
                    @foreach ($roles as $rol)
                    <div class="custom-control custom-checkbox">
                        <input id="rol{{$rol->id}}" value="{{$rol->id}}" name="rol" type="checkbox" class="form-check-input">
                    <label class="custom-control-label" for="rol{{$rol->id}}">{{$rol->nombre}}</label>
                    </div>

                    @endforeach

              </div>
            </div>

            <div class="row mt-2">
              <div class="col-3"></div>
              <div class="col-9">
                  <input class="btn btn-primary btn-lg btn-block" type="submit" value="Guardar">
                  <a href="{{url('/')}}" class="btn btn-primary btn-lg btn-block">Atras</a>
              </div>
            </div>


        </form>
    </div>
</div>


@endsection
