<?php

namespace App\Http\Requests;

use App\Enrollment;
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
            'validate' => 'boolean',
            'repeating' => 'required|boolean',
            'postcode' => 'required',
            'course_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'El campo nombre es obligatorio',
            'last_name.required' => 'El campo apellidos es obligatorio',
            'nif.required' => 'El campo NIF es obligatorio',
            'adress.required' => 'El campo direccion es obligatorio',
            'validate.required' => 'El campo validado es obligatorio',
            'repeating.required' => 'El campo repetidor es obligatorio',
            'postcode.required' => 'El campo codigo postal es obligatorio',
            'course_id.required' => 'La seleccion del curso es obligatoria'
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
                'postcode' => $this->postcode,
            ]);
            Enrollment::create([
                'validated' => $this->validate ?? 0,
                'repeating' => $this->repeating ?? 0,
                'student_id'=> $student->id,
                'course_id'=> $this->course_id,
            ]);
        });
    }

}