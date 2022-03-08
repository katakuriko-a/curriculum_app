<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //

    public function index(Request $request)
    {

        if (!empty($request)) {
            $teachers = Teacher::where('name', 'like', '%' . $request->name . '%')
                ->Where('age', 'like', '%' . $request->age . '%')
                ->Where('career', 'like', '%' . $request->career . '%')
                ->Where('fee', 'like', '%' . $request->fee . '%')
                ->Where('language', 'like', '%' . $request->language . '%')
                ->OrderBy('created_at', 'desc')
                ->get();
        } else {
            $teachers = Teacher::latest()->get();
        }
        return response()->json($teachers);
    }
}
