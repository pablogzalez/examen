<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    public function student() //cambio la relacion a singular, como nos dijiste.
    {
        return $this->belongsTo(Student::class);
    }

}
