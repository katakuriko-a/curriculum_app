<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    //
    public function index(){
        $levels = Level::latest()->get();
        return response()->json($levels);
    }
}
