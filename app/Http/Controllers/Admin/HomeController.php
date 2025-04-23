<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->get();
        $teams = Team::latest()->get();
        $testimonies = Testimony::latest()->get();
        $services = Service::latest()->get();
        $articles = Article::latest()->get();

        return view('public.index', compact([
            'teams',
            'clients',
            'testimonies',
            'services',
            'articles',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
