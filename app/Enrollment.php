<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }

}
