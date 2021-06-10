<tr>
    <td>{{ $student->id }}</td>
    <td>
        {{ $student->first_name }}
        {{--        <span class="status st-{{ $student->work_status ? 'active' : 'inactive' }}"></span>--}}
        {{--        <span class="note">{{ $cabbie->company->name }}</span>--}}
    </td>
    <td>{{ $student->last_name }}</td>
    <td>{{ $student->nif }}</td>
    <td>{{ $student->adress }}</td>
    <td>{{ $student->postcode }}</td>
    <td>{{ $student->created_at }}</td>
{{--    <td>{{ $enrollment->validate }}</td>--}}
{{--   <td>{{ $enrollment->repeating }}</td>--}}
    <td></td>
    <td></td>

    {{--    <td>Modelo: {{ $cabbie->car->model }} <br>Marca: {{ $cabbie->car->brand }} <br>Matricula: {{ $cabbie->car->enrollment }}--}}
    {{--        <br>Kilometros: {{ $cabbie->car->kms }}</td>--}}

</tr>

{{--<tr class="categories">--}}

{{--    <td colspan="4"><span class="note">{{ $product->categories->implode('name', ', ') ?: 'Sin Categorias'}}</span></td>--}}
{{--</tr>--}}