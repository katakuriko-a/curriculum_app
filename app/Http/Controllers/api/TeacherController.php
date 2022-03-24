<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;

/**
 * 先生に関するコントローラーです。
 */
class TeacherController extends Controller
{

    /**
     * 先生の一覧表示（生徒のmypage)
     *
     * @return object 先生の一覧
     */
    public function index()
    {
        $teachers = User::where('roles_id', '=', '2')->latest()->get();
        return response()->json($teachers);
    }

    /**
     * 先生の予約ページの表示
     *
     * @param integer 先生のid
     * @return object 先生の情報
     */
    public function get_teacher($id)
    {
        $teacher = User::find($id);
        return response()->json($teacher);
    }

    /**
     * 先生の新規登録
     *
     * @param object 先生の新規登録情報
     * @return object 新規登録された先生の情報
     */
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
