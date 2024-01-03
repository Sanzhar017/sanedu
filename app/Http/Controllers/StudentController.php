<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
      return view('students.index');
    }

    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {

    }


    public function show(Student $student)
    {

    }


    public function edit(Student $student)
    {
        return view('students.edit');
    }


    public function update(Request $request, Student $student)
    {
        //
    }


    public function destroy(Student $student)
    {
        //
    }
}
