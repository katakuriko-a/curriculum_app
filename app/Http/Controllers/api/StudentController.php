<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
use League\CommonMark\Extension\Table\TableRow;

class StudentController extends Controller
{

    public function index(Request $request)
    {

        if (!empty($request)) {
            $students = Student::where('name', 'like', '%' . $request->search . '%')
                ->Where('name', 'like', '%' . $request->name . '%')
                ->Where('age', 'like', '%' . $request->age . '%')
                ->Where('birth', 'like', '%' . $request->birth . '%')
                ->Where('tel', 'like', '%' . $request->tel . '%')
                ->Where('mail', 'like', '%' . $request->mail . '%')
                ->Where('plan', 'like', '%' . $request->plan . '%')
                ->OrderBy('created_at', 'desc')
                ->get();
        } else {
            $students = Student::latest()->get();
        }
        return response()->json($students);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }



    public function store(Request $request)
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

        return response()->json($student);
    }



    public function update(Request $request, $id)
    {

        $student = Student::find($id);

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
        ])->save();

        return response()->json($student);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json();
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
}
