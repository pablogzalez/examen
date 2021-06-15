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

                <th scope="col"><a href="{{ $sortable->url('first_name') }}" class="{{ $sortable->classes('first_name') }}">Nombre</a></th>
                <th scope="col"><a href="{{ $sortable->url('last_name') }}" class="{{ $sortable->classes('last_name') }}">Apellido</a></th>
                <th scope="col"><a href="">NIF</a></th>
                <th scope="col"><a href="">Calle</a></th>
                <th scope="col"><a href="">Codigo postal</a></th>
                <th scope="col"><a href="">Fecha de alta</a></th>
                <th scope="col"><a href="">Validado</a></th>
                <th scope="col"><a href="">Repetidor</a></th>

            </tr>
            </thead>
            <tbody>
            @each('students._row', $students, 'student')
            </tbody>
        </table>
        {{ $students->links() }}
    </div>

@endsection