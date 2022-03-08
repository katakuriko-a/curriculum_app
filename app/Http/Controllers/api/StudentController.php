<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
use App\Models\Level;
use League\CommonMark\Extension\Table\TableRow;

class StudentController extends Controller
{
    public function current_student(Request $request){
        $student = Student::where('mail', 'like', '%' . $request->mail . '%')
        ->first();
        return response()->json($student->id);
    }

    public function current_student_name(Request $request){
        $student = Student::find($request->id);
        return response()->json($student->name);
    }

    public function book(Request $request)
    {
        $student = Student::find($request->current_student_id);
        $student->teachers()
            ->attach([$request->teacher_id => ['start_time' =>$request->start_time,  'end_time' => $request->end_time,]]);

        return response()->json();
    }

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
        $level = Level::where('name', $request->level)
            ->first();

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
            'level_id' => $level->id,
        ])->save();

        return response()->json($student);
    }



    public function update(Request $request, $id)
    {

        $student = Student::find($id);
        $level = Level::where('name', $request->level)
            ->first();

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
            'level_id' => $level->id,
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
