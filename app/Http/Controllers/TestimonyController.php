<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index(){
        return view('admin.testimony.index');
    }
}
