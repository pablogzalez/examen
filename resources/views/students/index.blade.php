@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1>Listado de Estudiantes</h1>

    <p>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Crear Estudiante</a>
    </p>

    @includeWhen($view == 'index', 'students._filters')

    <div class="table-responsive-lg">
        <table class="table table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#<span></span></th>

                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">NIF</th>
                <th scope="col">Calle</th>
                <th scope="col">Codigo postal</th>
                <th scope="col">Fecha de alta</th>
                <th scope="col">Validado</th>
                <th scope="col">Repetidor</th>

            </tr>
            </thead>
            <tbody>
            @each('students._row', $students, 'student')
            </tbody>
        </table>
        {{ $students->links() }}
    </div>

@endsection