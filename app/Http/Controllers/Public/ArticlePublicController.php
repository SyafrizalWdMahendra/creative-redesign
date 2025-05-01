<?php

namespace App\Http\Controllers\Public;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Study;

class ArticlePublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        $studies = Study::latest()->get();
        $services = Service::latest()->get();
        $contacts = Contact::latest()->get();

        return view('public.article.index', compact(['articles', 'studies', 'services', 'contacts']));
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
        $articles = Article::findOrFail($id);
        $services = Service::latest()->get();
        $studies = Study::latest()->get();
        $contacts = Contact::latest()->get();

        return view('public.article.detail', compact(['articles', 'services', 'studies', 'contacts']));
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

        $searchArticles = Article::where('title', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('public.article.search_results', [
            'searchArticles' => $searchArticles,
            'searchQuery' => $query,
            'services' => $services,
            'studies' => $studies,
            'contacts' => $contacts,
        ]);
    }
}
