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
      $request->validate([
        'name' => 'required|string|max:255',
        'student_id' => 'required|string|max:255',
      ]);

      Student::create([
        'name' => $request->input('name'),
        'student_id' => $request->input('student_id'),
      ]);

      return redirect()->route('students.index')->with('success', 'Student created successfully');
    }


    public function show(Student $student)
    {

    }


    public function edit(Student $student)
    {
      return view('students.edit', compact('student'));
    }


    public function update(Request $request, Student $student)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'student_id' => 'required|string|max:255',
      ]);

      $student->update([
        'name' => $request->input('name'),
        'student_id' => $request->input('student_id'),
      ]);

      return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }


    public function destroy($id)
    {
      $student = Student::findOrFail($id);
      $student->delete();

      return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
