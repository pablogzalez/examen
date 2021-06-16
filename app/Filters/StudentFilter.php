<?php

namespace App\Filters;

use App\Rules\SortableColumn;
use App\Sortable;
use Carbon\Carbon;
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
            if ($active == 'active') {
                $query->WhereHas('enrollment', function ($query) use ($active) {
                    $query->where('validated', 1);
                });
            } elseif ($active == 'inactive') {
                $query->WhereHas('enrollment', function ($query) use ($active) {
                    $query->where('validated', 0);
            });
        }
    }

    public function minDate($query, $desde)
    {
        $date = Carbon::createFromFormat('Y-m-d', $desde);
        $query->whereDate('created_at', '>=', $date); //ya no es fecha_alta, ya que lo borre para utilizar el created_at directamente.
    }

    public function maxDate($query, $a)
    {
        $date = Carbon::createFromFormat('Y-m-d', $a);
        $query->whereDate('created_at', '<=', $date);
    }

    public function search($query, $search)
    {
        return $query->where('first_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%");
    }

}