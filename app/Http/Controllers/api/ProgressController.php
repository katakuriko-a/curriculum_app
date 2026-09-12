<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Student;

/**
 * 生徒の進捗情報に関するコントローラーです。
 */

class ProgressController extends Controller
{
    /**
     * 進捗情報の一覧表示
     *
     * @param integer $id ユーザーのid
     * @return object $progress 進捗情報
     */
    public function index($id)
    {
        $progress = Progress::where('user_id', 'LIKE', '%' . $id . '%')
            ->latest()->get();
        return response()->json($progress);
    }

    /**
     * 進捗情報の新規投稿
     *
     * @param object $request 入力された進捗情報
     * @param integer $id ユーザーのid
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $progress = new Progress();
        $progress->fill([
            'user_id' => $id,
            'title' => $request->title,
            'content' => $request->content,
        ])->save();
        return response()->json();
    }

    /**
     * 更新したい進捗情報の取得
     *
     * @param integer 進捗情報のid
     * @return object 更新したい進捗情報
     */
    public function edit($id)
    {
        $post = Progress::find($id);
        return response()->json($post);
    }


    /**
     * 進捗情報の更新
     *
     * @param integer 進捗情報のid
     * @return object 更新後の進捗情報
     */
    public function update(Request $request, $id)
    {
        $progress = Progress::find($id);
        $progress->fill([
            'title' => $request->title,
            'content' => $request->content,
        ])->save();
        return response()->json($progress);
    }


    /**
     * 進捗情報の削除
     *
     * @param integer 進捗情報のid
     */
    public function destroy($id)
    {
        $post = Progress::find($id);
        $post->delete();
        return response()->json();
    }
}
