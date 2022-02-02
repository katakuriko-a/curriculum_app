<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{

    public function index()
    {

        $students = Student::latest()->get();

        return view('index')
            ->with(['students' => $students]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(StudentRequest $request)
    {

        $student = new Student();

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
        ])->save();

        return redirect()
            ->route('students.index');
    }

    public function edit(Student $student)
    {
        return view('edit')
            ->with(['student' => $student]);
    }

    public function update(StudentRequest $request, Student $student)
    {

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
        ])->save();

        return redirect()
            ->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $students = Student::where('tel', 'LIKE', '%'.$search.'%')->get();
        return view('search')
            ->with(['students' => $students])
            ->with(['search' => $search]);
    }
}
