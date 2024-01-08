<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
      $students = Student::paginate(10)->withQueryString();





      return view('content.pages.pages-home', ['students' => $students]);

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


    public function destroy($id)
    {
      $student = Student::findOrFail($id);
      $student->delete();

      return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
