<tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->last_name }}</td>
    <td>
        {{ $student->first_name }}
    </td>

    <td>{{ $student->nif }}</td>
    <td>{{ $student->enrollment->validated}}</td>
    <td>{{ $student->enrollment->repeating}}</td>
    <td>{{ $student->created_at }}</td>
    <td></td>


</tr>
