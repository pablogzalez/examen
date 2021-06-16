<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CreateStudentRequest;
use App\Sortable;
use App\Student;
use App\Enrollment;


class StudentController extends Controller
{
    public function index(Sortable $sortable)
    {
        $enrollments = Enrollment::all();

        $students = Student::query()
            ->with('enrollment')
            ->applyFilters()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate();

        $sortable->appends($students->parameters());

        return view('students.index', [
            'students' => $students,
            'view' => 'index',
            'sortable' => $sortable,
        ]);

    }

    public function create()
    {
        return $this->form('students.create', new Student());
    }

    public function store(CreateStudentRequest $request)
    {
        $request->createStudent();

        return redirect()->route('students.index');
    }

    public function form($view, Student $student)
    {
        return view($view, [
            'student' => $student,
            'courses' => Course::orderBy('level', 'ASC')->get(), // para que las opciones en el desplegable del formulario de creacion aparezcan ordenados por nivel.
        ]);
    }
}