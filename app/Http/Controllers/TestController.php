<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{

    public function index() {

        $tests = Test::latest()->get();

        return view('index')
        ->with(['tests' => $tests]);
    }

    public function create() {
        return view('create');
    }

    public function store(TestRequest $request) {

        $test = new Test();
        $test->name = $request->name;
        $test->age = $request->age;
        $test->birth = $request->birth;
        $test->mail = $request->mail;
        $test->tel = $request->tel;
        $test->plan = $request->plan;
        $test->save();

        return redirect()
            ->route('tests.index');
    }

    public function edit(Test $test)
    {
        return view('edit')
        ->with(['test' => $test]);
    }

    public function update(TestRequest $request, Test $test) {

        $test->name = $request->name;
        $test->age = $request->age;
        $test->birth = $request->birth;
        $test->mail = $request->mail;
        $test->tel = $request->tel;
        $test->plan = $request->plan;
        $test->save();

        return redirect()
            ->route('tests.index');
    }

    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()
            ->route('tests.index');
    }
}
