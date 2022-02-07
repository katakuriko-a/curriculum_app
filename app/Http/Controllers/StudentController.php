<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
use League\CommonMark\Extension\Table\TableRow;

class StudentController extends Controller
{

    public function index(Request $request)
    {

        if (!empty($request)) {
            $search = $request->search;
            $students = Student::where('name', 'LIKE', '%' . $search . '%')
                                ->Where('name', 'like', '%' . $request->name . '%')
                                ->Where('age', 'like', '%' . $request->age . '%')
                                ->Where('birth', 'like', '%' . $request->birth . '%')
                                ->Where('tel', 'like', '%' . $request->tel . '%')
                                ->Where('mail', 'like', '%' . $request->mail . '%')
                                ->Where('plan', 'like', '%' . $request->plan . '%')
                                ->OrderBy('created_at','desc')
                                ->get();
            return view('index')
                ->with(['students' => $students])
                ->with(['search' => $search]);
        } else {
            $students = Student::latest()->get();
            return view('index')
                ->with(['students' => $students]);
        }

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
}
