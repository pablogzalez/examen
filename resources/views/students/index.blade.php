@extends('layout')

@section('title', 'Usuarios')

@section('content')

    {{--    <div class="d-flex justify-content-between align-items-end mb-3 mt-5">--}}
    {{--        <h1 class="pb-1">{{ trans("users.title.{$view}") }}</h1>--}}
    {{--        <p>--}}
    {{--                @if ($view == 'index')--}}
    {{--                <a href="{{ route('users.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>--}}
    {{--                    <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo producto</a>--}}
    {{--                  @else--}}
    {{--                <a href="{{ route('users.index') }}" class="btn btn-outline-dark">Regresar al listado de usuarios</a>--}}
    {{--                @endif--}}
    {{--        </p>--}}
    {{--    </div>--}}

    {{--    @includeWhen($view == 'index', 'cabbies._filters')--}}

    {{--@if ($products->isNotEmpty())--}}
    <h1>Listado de Estudiantes</h1>

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

    {{--@else--}}
    {{--    <p>No hay usuarios registrados</p>--}}
    {{--@endif--}}
@endsection