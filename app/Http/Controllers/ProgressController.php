<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Student;

class ProgressController extends Controller
{
    public function index(Student $student)
    {
        $posts = Progress::where('student_id', 'LIKE', '%' . $student->id . '%')
            ->latest()->get();
        return view('progress')
            ->with(['posts' => $posts])
            ->with(['student' => $student]);
    }

    public function create(Student $student)
    {
        return view('createPosts')
            ->with(['student' => $student]);
    }

    public function store(Request $request, Student $student)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $progress = new Progress();
        $progress->fill([
            'student_id' => $student->id,
            'title' => $request->title,
            'content' => $request->content,
        ])->save();

        $posts = Progress::where('student_id', 'LIKE', '%' . $student->id . '%')
            ->latest()->get();

        return redirect()
            ->route('progress.index', $student);
    }

    public function edit(Progress $progress)
    {
        return view('editPosts')
            ->with(['progress' => $progress]);
    }

    public function update(Request $request, Progress $progress)
    {

        $progress->fill([
            'title' => $request->title,
            'content' => $request->content,
        ])->save();

        return redirect()
            ->route('progress.index', $progress->student);
    }

    public function destroy(Progress $progress)
    {
        $progress->delete();
        return redirect()
            ->route('progress.index', $progress->student);
    }
}
