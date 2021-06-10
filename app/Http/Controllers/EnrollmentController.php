<?php

namespace App\Http\Controllers;

use App\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {

        $students = Enrollment::query()
            ->orderByDesc('created_at')
            ->paginate();

        return view('students.index', [
            'enrollments' => $students,
            'view' => 'index'
        ]);

    }
}