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

        if (isset($request)) {
            $search = $request->search;
            $students = Student::where('tel', 'LIKE', '%' . $search . '%')
                ->latest()
                ->get();
                $row = count($students);
                if($row == 0){
                    session()->flash('flash_message', 'データが見つかりませんでした。');
                    return redirect()
                        ->route('students.index');
                } else {
                    return view('index')
                        ->with(['students' => $students])
                        ->with(['search' => $search]);
                }
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
