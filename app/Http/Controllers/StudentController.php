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
                ->OrderBy('created_at', 'desc')
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

    public function csv(Request $request)
    {
        $students = Student::all();

        $csvExporter = new \Laracsv\Export();

        $csvExporter->build($students, [
            'name' => 'ユーザー名',
            'age' => '年齢',
            'birth' => '生年月日',
            'mail' => 'メールアドレス',
            'tel' => '電話番号',
            'plan' => 'プラン',
            'created_at' => '登録日',
        ]);

        $csvReader = $csvExporter->getReader();

        $csvReader->setOutputBOM(\League\Csv\Reader::BOM_UTF8);

        $filename = $request->filename . '.csv';

        return response((string) $csvReader)
            ->header('Content-Type', 'text/csv; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function test()
    {
        return response()->json([
            'result' => 'Response from Laravel',
        ]);
    }
}
