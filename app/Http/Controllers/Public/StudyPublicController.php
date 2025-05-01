<?php

namespace App\Http\Controllers\Public;

use App\Models\Study;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;

class StudyPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Study::latest()->get();
        $services = Service::latest()->get();
        $contacts = Contact::latest()->get();

        return view('public.study.index', compact(['studies', 'services', 'contacts']));
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
        $findStudy = Study::findOrFail($id);
        $services = Service::latest()->get();
        $studies = Study::latest()->get();
        $contacts = Contact::latest()->get();


        return view('public.study.detail', compact(['findStudy', 'services', 'studies', 'contacts']));
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

        $searchStudies = Study::where('title', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('public.study.search_results', [
            'searchStudies' => $searchStudies,
            'searchQuery' => $query,
            'services' => $services,
            'studies' => $studies,
            'contacts' => $contacts,
        ]);
    }
}
