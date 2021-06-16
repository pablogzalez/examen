<?php

namespace App;

class StudentQuery extends QueryBuilder
{
    public function findByName($name)
    {
        return $this->where('first_name', $name)->first();
    } //anado la funcion ya que, ahora, para realizar test la necesito.
}
