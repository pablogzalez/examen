@extends('layout')

@section('title', 'Crear estudiantes')

@section('content')
    <x-card>
        @slot('header', 'Crear un estudiante')
        @include('shared._errors')

        <form method="post" action="{{ route('students.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="first_name" placeholder="Nombre.." value="{{ old('first_name', $student->first_name) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="code">Apellido:</label>
                <input type="text" name="last_name" placeholder="Apellido.." value="{{ old('last_name', $student->last_name) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">NIF:</label>
                <input type="text" name="nif" placeholder="NIF.." value="{{ old('nif', $student->nif) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="expiration_date">Direccion:</label>
                <input type="text" name="adress" placeholder="Direccion.." value="{{ old('adress', $student->adress) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="expiration_date">Codigo postal:</label>
                <input type="text" name="postcode" placeholder="Codigo Postal..." value="{{ old('postcode', $student->postcode) }}" class="form-control">
            </div>

            <label for="stock">¿Validado?</label>

            @foreach([ '1' => 'Validado'] as $value => $text)
                <div class="form-check form-check-inline ml-3">
                    <input type="checkbox" class="form-check-input" name="validate" id="students_{{ $value ?: 'all' }}"
                           value="{{ $value }}" {{ old('validate') ? 'checked' : '' }}>
                    <label class="form-check-label" for="students_{{ $value ?: 'all' }}">{{ $text }}</label>
                </div>
            @endforeach
            <br>

            <label for="stock">¿Repite?:</label>

            @foreach([ '1' => 'Repetidor', '0' => 'No Repetidor'] as $value => $text)
                <div class="form-check form-check-inline ml-3">
                    <input type="radio" class="form-check-input" name="repeating" id="students_{{ $value ?: 'all' }}"
                           value="{{ $value }}" {{ old('repeating', $value) == $value ? 'checked' : '' }}>
                    <label class="form-check-label" for="students_{{ $value ?: 'all' }}">{{ $text }}</label>
                </div>
            @endforeach

            <div class="form-group">
                <label for="course_id">Curso: </label>
                <select name="course_id" id="course_id" class="form-control">
                    <option value="">Selecciona un nivel</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course .  $course->level }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Crear estudiante</button>
                <a href="{{ route('students.index') }}" class="btn btn-link">Regresar al listado de estudiantes</a>
            </div>
        </form>
    </x-card> 