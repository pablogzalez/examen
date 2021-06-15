<?php

namespace App\Http\Requests;

use App\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'nif' => 'required',
            'adress' => 'required',
            'fecha_alta' => 'required|date_format:Y-m-d',
            'validate' => 'required|boolean',
            'repeating' => 'required|boolean',
            'postcode' => 'required'
        ];
    }

    public function createStudent()
    {
        DB::transaction(function () {
            $student = Student::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'nif' => $this->nif,
                'adress' => $this->adress,
                'fecha_alta' => $this->fecha_alta,
                'validate' => $this->validate ?? 0,
                'repeating' => $this->repeating ?? 0,
                'postcode' => $this->postcode,
            ]);
        });
    }

}