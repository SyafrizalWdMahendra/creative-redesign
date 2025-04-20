<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyWorkController extends Controller
{
    public function index()
    {
        return view('admin.study_work.index');
    }
}
