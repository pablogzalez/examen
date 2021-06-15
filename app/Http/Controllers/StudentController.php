<?php

namespace App\Http\Controllers;

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
            ->applyFilters()
            ->orderByDesc('created_at')
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
        ]);
    }
}