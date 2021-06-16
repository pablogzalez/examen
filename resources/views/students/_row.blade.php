<tr>
    <td>{{ $student->id }}</td>
    <td>
        {{ $student->first_name }}
    </td>
    <td>{{ $student->last_name }}</td>
    <td>{{ $student->nif }}</td>
    <td>{{ $student->adress }}</td>
    <td>{{ $student->postcode }}</td>
    <td>{{ $student->enrollment->validated}}</td>
    <td>{{ $student->enrollment->repeating}}</td>
    <td></td>


</tr>
