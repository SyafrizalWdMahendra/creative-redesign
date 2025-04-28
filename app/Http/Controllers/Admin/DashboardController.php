<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryContent;
use App\Models\Service;
use App\Models\Study;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::count();
        $teams = Team::count();
        $studies = Study::count();
        $services = Service::count();
        $clientContents = HistoryContent::with(['client', 'team', 'study', 'service', 'testimony', 'contact', 'article', 'studentWork'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.dashboard.index', compact(['clients', 'teams', 'studies', 'services', 'clientContents']));
    }
}
