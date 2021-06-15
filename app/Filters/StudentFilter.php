<?php

namespace App\Filters;

use App\Rules\SortableColumn;
use App\Sortable;
use Illuminate\Support\Facades\DB;

class StudentFilter extends QueryFilter
{
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'validate' => 'in:active,inactive',
            'repeating' => 'in:active,inactive',
            'minDate' => 'date_format:Y-m-d',
            'maxDate' => 'date_format:Y-m-d',
        ];
    }

    public function validate($query, $active)
    {
        return $query->when($active, function ($query, $active) {
            if ($active == 'active') {
                $query->where('validate', 1);
            } elseif ($active == 'inactive') {
                $query->where('validate', 0);
            }
        });
    }

    public function minDate($query, $desde)
    {
        $query->where('fecha_alta', '>=', $desde);
    }

    public function maxDate($query, $a)
    {
        $query->where('fecha_alta', '<=', $a);
    }

    public function search($query, $search)
    {
        return $query->where('first_name' ,  'first_name', "%$search%")
            ->orWhere('first_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%");
    }

    public function getColumnName($alias)
    {
        return $this->aliasses[$alias] ?? $alias;
    }

}