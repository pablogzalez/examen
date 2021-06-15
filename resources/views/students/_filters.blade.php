<form method="get" action="{{ route('students.index') }}">

    <div class="row row-filters ">
        @foreach(['' => 'Todos', 'active' => 'Validado', 'inactive' => 'Sin validar'] as $value => $text)
            <div class="form-check form-check-inline ml-3">
                <input type="radio" class="form-check-input" name="validate" id="students_{{ $value ?: 'all' }}"
                       value="{{ $value }}" {{ $value === request('validate', '') ? 'checked' : '' }}>
                <label class="form-check-label" for="products_{{ $value ?: 'all' }}">{{ $text }}</label>
            </div>
        @endforeach
    </div>

    <div class="row row-filters">
        <div class="col-2">
            <h6>Buscador (nombre y apellidos):</h6>
            <div class="input-group">

                <input type="search" name="search" value="{{ request('search') }}"
                       class="form-control form-control-sm" placeholder="Buscar...">
            </div>
        </div>
    </div>

    <h6>Max-Min date:</h6>
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <div class="input-group mr-2">
                    <input type="search" name="minDate" value="{{ request('minDate') }}"
                           class="form-control form-control-sm" placeholder="Min fecha...">
                </div>
                <div class="input-group">
                    <input type="search" name="maxDate" value="{{ request('maxDate') }}"
                           class="form-control form-control-sm" placeholder="Max fecha...">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
</form>