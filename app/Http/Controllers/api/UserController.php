<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reserve;
use App\Models\Teacher;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {

        if (!empty($request)) {
            $students = User::where('name', 'like', '%' . $request->search . '%')
                ->Where('name', 'like', '%' . $request->name . '%')
                ->Where('age', 'like', '%' . $request->age . '%')
                ->Where('birth', 'like', '%' . $request->birth . '%')
                ->Where('tel', 'like', '%' . $request->tel . '%')
                ->Where('mail', 'like', '%' . $request->mail . '%')
                ->Where('plan', 'like', '%' . $request->plan . '%')
                ->OrderBy('created_at', 'desc')
                ->get();
        } else {
            $students = User::latest()->get();
        }
        return response()->json($students);
    }

    public function edit($id)
    {
        $student = User::find($id);
        return response()->json($student);
    }

    public function get_student(Request $request)
    {
        $student = User::where('mail', '=', $request->mail)->first();
        return response()->json($student);
    }

    public function store(Request $request)
    {

        $student = new User();

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
            'experience_month' => $request->experience_month,
            'skill' => $request->skill,
            'roles_id' => $request->roles_id,
        ])->save();

        return response()->json($student);
    }

    public function teacher_store(Request $request)
    {

        $student = new User();

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'fee' => $request->fee,
            'experience_month' => $request->experience_month,
            'skill' => $request->skill,
            'roles_id' => $request->roles_id,
        ])->save();

        return response()->json($student);
    }

    public function current_student(Request $request)
    {
        $student = User::where('mail', 'like', '%' . $request->mail . '%')
            ->first();
        return response()->json($student->id);
    }


    public function update(Request $request, $id)
    {

        $student = User::find($id);

        $student->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
            'fee' => $request->fee,
            'skill' => $request->skill,
            'experience_month' => $request->experience_month,
        ])->save();

        return response()->json($student);
    }

    public function reserve(Request $request)
    {
        $reserve = new Reserve();
        $reserve->fill([
            'student_id' => $request->current_student_id,
            'teacher_id' => $request->teacher_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'teacher_name' => $request->teacher_name,
            'student_name' => $request->student_name,
        ])->save();

        return response()->json();
    }

    public function get_reserve($id)
    {
        $reserves = Reserve::where('student_id', '=', $id)->orderBy('start_time')->get();
        return response()->json($reserves);
    }
    public function get_reserve_students($id)
    {
        $reserves = Reserve::where('teacher_id', '=', $id)->orderBy('start_time')->get();
        return response()->json($reserves);
    }

    public function destroy_reserve($id)
    {
        Reserve::find($id)->delete();
        return response()->json();
    }

    public function edit_reserve(Request $request, $id)
    {
        $reserve = Reserve::find($id);
        // $reserve = $reserves->where('id', '=', $id);
        return response()->json($reserve);
    }
    public function update_reserve(Request $request)
    {
        $reserve = Reserve::find($request->reserve_id);
        $reserve->fill([
            'student_id' => $request->current_student_id,
            'teacher_id' => $request->teacher_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'teacher_name' => $request->teacher_name,
        ])->save();

        return response()->json();
    }
}
