<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateStudentRequest;


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


    public function store(StudentRequest $request)
    {
      $validatedData = $request->validated();

      Student::create($validatedData);

      return redirect()->route('students.index')->with('success', 'Student created successfully');
    }


    public function show(Student $student)
    {
      return view('students.show', ['student' => $student]);
    }


    public function edit(Student $student)
    {
      return view('students.edit', ['student' => $student]);
    }


  public function update(UpdateStudentRequest $request, Student $student)
  {
    $validatedData = $request->validated();

    $student->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Student updated successfully');
  }

    public function destroy($id)
    {
      $student = Student::findOrFail($id);

      $student->delete();

      return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
