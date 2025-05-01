<?php

namespace App\Http\Controllers\Public;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Study;

class ServicePublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        $studies = Study::latest()->get();
        $contacts = Contact::latest()->get();

        return view('public.service.index', compact(['services', 'studies', 'contacts']));
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
        $findServices = Service::findOrFail($id);
        $services = Service::latest()->get();
        $studies = Study::latest()->get();
        $contacts = Contact::latest()->get();

        return view('public.service.detail', compact(['findServices', 'services', 'studies', 'contacts']));
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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $services = Service::latest()->get();
        $studies = Study::latest()->get();
        $contacts = Contact::latest()->get();

        $searchServices = Service::where('title', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('public.service.search_results', [
            'searchServices' => $searchServices,
            'searchQuery' => $query,
            'services' => $services,
            'studies' => $studies,
            'contacts' => $contacts,
        ]);
    }
}
