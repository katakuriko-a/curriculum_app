<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Student;

class ProgressController extends Controller
{
    public function index($id)
    {
        $progress = Progress::where('student_id', 'LIKE', '%' . $id . '%')
            ->latest()->get();
            return response()->json($progress);
    }

    public function create(Student $student)
    {
        return view('createPosts')
            ->with(['student' => $student]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $progress = new Progress();
        $progress->fill([
            'student_id' => $id,
            'title' => $request->title,
            'content' => $request->content,
        ])->save();

        return response()->json();
    }

    public function edit($id)
    {
        $post = Progress::find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $progress = Progress::find($id);

        $progress->fill([
            'title' => $request->title,
            'content' => $request->content,
        ])->save();

        return response()->json($progress);
    }
    public function destroy($id)
    {
        $post = Progress::find($id);
        $post->delete();

        return response()->json();
    }
}
