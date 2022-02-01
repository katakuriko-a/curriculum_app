<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

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
}
