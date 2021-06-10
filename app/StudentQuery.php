<?php

namespace App;

class StudentQuery extends QueryBuilder
{
    public function findByName($name)
    {
        return $this->where(compact('name'))->first();
    }

}
