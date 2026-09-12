<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reserve;
use App\Models\Teacher;

/**
 * メインのコントローラーです。
 */

class UserController extends Controller
{

    /**
     * ユーザー一覧の取得、詳細検索でユーザーの絞り込み
     *
     * @param string $name 名前
     * @param string $age 年齢
     * @param string $birth 生年月日
     * @param string $mail メールアドレス
     * @param string $tel 電話番号
     * @param string $plan プラン名
     * @return array ユーザー一覧
     */
    public function index(Request $request)
    {
        if (!empty($request)) {
            $users = User::where('name', 'like', '%' . $request->search . '%')
                ->Where('name', 'like', '%' . $request->name . '%')
                ->Where('age', 'like', '%' . $request->age . '%')
                ->Where('birth', 'like', '%' . $request->birth . '%')
                ->Where('tel', 'like', '%' . $request->tel . '%')
                ->Where('mail', 'like', '%' . $request->mail . '%')
                ->OrderBy('roles_id', 'desc')
                ->get();
        } else {
            $users = User::orderBy('roles_id')->get();
        }
        return response()->json($users);
    }

    /**
     * ユーザーの中から生徒のみを取得
     *
     * @return array 生徒一覧
     */
    public function get_students()
    {
        $students = User::where('roles_id', '=', '1')->get();
        return response()->json($students);
    }

    /**
     * ユーザー情報の編集
     *
     * @param integer $id 現在ログイン中のユーザーID
     * @return object 変更後のユーザー情報
     */
    public function edit($id)
    {
        $student = User::find($id);
        return response()->json($student);
    }

    /**
     * ログイン時のメールアドレスでユーザを取得
     *
     * @param string $mail メールアドレス
     * @return object ログイン中のユーザー情報
     */
    public function get_user(Request $request)
    {
        $user = User::where('mail', '=', $request->mail)->first();
        return response()->json($user);
    }

    /**
     * ユーザーの新規登録
     *
     * @param object $request ユーザー情報
     * @return object 新規登録したユーザー
     */
    public function store(Request $request)
    {

        $user = new User();

        $user->fill([
            'name' => $request->name,
            'age' => $request->age,
            'birth' => $request->birth,
            'mail' => $request->mail,
            'tel' => $request->tel,
            'plan' => $request->plan,
            'experience_month' => $request->experience_month,
            'skill' => $request->skill,
            'fee' => $request->fee,
            'roles_id' => $request->roles_id,
        ])->save();

        return response()->json($user);
    }

    /**
     * 現在ログイン中のユーザーのIDをvuexに登録
     *
     * @param string $mail メールアドレス
     * @return integer 現在ログイン中のユーザーのID
     */
    public function current_user(Request $request)
    {
        $user = User::where('mail', '=', $request->mail)
            ->first();
        return response()->json($user->id);
    }

    /**
     * ユーザー情報の更新
     *
     * @param object $request ユーザー情報
     * @return object 新規登録したユーザー
     */
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

    /**
     * 授業の予約
     *
     * @param object $request 予約日時
     */
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

    /**
     * 予約情報の取得(生徒ページ)
     *
     * @param integer $id 生徒のid
     * @return object 予約情報
     */
    public function get_reserve($id)
    {
        $reserves = Reserve::where('student_id', '=', $id)->orderBy('start_time')->get();
        return response()->json($reserves);
    }

    /**
     * 予約情報の取得(先生ページ)
     *
     * @param integer $id 先生のid
     * @return object 予約情報
     */
    public function get_reserve_students($id)
    {
        $reserves = Reserve::where('teacher_id', '=', $id)->orderBy('start_time')->get();
        return response()->json($reserves);
    }

    /**
     * 予約の削除
     *
     * @param integer $id 予約情報のid
     */
    public function destroy_reserve($id)
    {
        Reserve::find($id)->delete();
        return response()->json();
    }

    /**
     * 更新したい予約情報を取得
     *
     * @param integer $id 予約情報のid
     * @return object 更新したい予約情報
     */
    public function edit_reserve($id)
    {
        $reserve = Reserve::find($id);
        return response()->json($reserve);
    }

    /**
     * 予約情報の更新
     *
     * @param object $request 予約情報
     */
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

    /**
     * ユーザーの削除
     *
     * @param integer $id ユーザーのid
     */
    public function destroy($id)
    {
        $student = User::find($id);
        $student->delete();

        return response()->json();
    }

    /**
     * ユーザの情報をCSV形式で保存
     *
     * @param object $request リクエストタイプの指定
     * @return object ファイル作成に関する情報
     */
    public function csv(Request $request)
    {
        $students = User::all();

        $csvExporter = new \Laracsv\Export();

        $csvExporter->build($students, [

            'roles_id' => 'roles',
            'name' => 'ユーザー名',
            'age' => '年齢',
            'birth' => '生年月日',
            'mail' => 'メールアドレス',
            'tel' => '電話番号',
            'plan' => 'プラン',
            'experience_month' => '経験月数',
            'skill' => 'スキル',
            'fee' => '料金',
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
