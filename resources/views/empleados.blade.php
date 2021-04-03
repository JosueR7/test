
@extends('template')


@section('title', 'Lista de empleados')

@section('content')
<div class="container">
    <div class="row">
        <h1>
        @yield('title')
        </h1>
    </div>
    <div class="row">
        <div class="col-12 text-end">
            <a href="{{url('/create')}}" class="btn btn-primary">Crear</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th><i class="fas fa-user"></i>Nombre</th>
                <th><i class="fas fa-at"></i>Email</th>
                <th><i class="fas fa-venus-mars"></i>Sexo</th>
                <th><i class="fas fa-briefcase"></i>Área</th>
                <th><i class="fas fa-envelope"></i>Boletin</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>

                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->sexo}}</td>
                        <td>{{$empleado->area}}</td>
                        <td>{{$empleado->boletin}}</td>
                        <td><a href="#"><i class="far fa-edit"></i></a></td>
                        <td>
                            <form action="{{ url('/'.$empleado->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
