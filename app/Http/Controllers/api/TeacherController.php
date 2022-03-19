<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    //

    public function index(Request $request)
    {

        // if (!empty($request)) {
        //     $teachers = User::where('name', 'like', '%' . $request->name . '%')
        //         ->Where('age', 'like', '%' . $request->age . '%')
        //         ->Where('career', 'like', '%' . $request->career . '%')
        //         ->Where('fee', 'like', '%' . $request->fee . '%')
        //         ->Where('language', 'like', '%' . $request->language . '%')
        //         ->OrderBy('created_at', 'desc')
        //         ->get();
        // } else {
        $teachers = User::where('roles_id', '=', '2')->latest()->get();
        // }
        return response()->json($teachers);
    }

    public function get_teacher($id)
    {

        $teacher = User::find($id);
        return response()->json($teacher);
    }

    public function store(Request $request)
    {

        $teacher = new User();
        $teacher->fill([
            'name' => $request->name,
            'age' => $request->age,
            'career' => $request->career,
            'fee' => $request->fee,
            'language' => $request->language,
        ])->save();

        return response()->json($teacher);
    }
}
