<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sortable;
use App\Student;
use App\Enrollment;
use Illuminate\Http\Request;

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
}