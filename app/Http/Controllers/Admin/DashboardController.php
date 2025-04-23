<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();

        return view('admin.dashboard.index', compact('clients'));
    }
}
