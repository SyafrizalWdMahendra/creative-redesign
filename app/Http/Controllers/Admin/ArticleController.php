<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();

        if ($articles->isEmpty()) {
            return redirect()->route('article_admin.create')->with('teamAlert', 'Silakan buat artikel baru.');
        }

        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'date' => 'required|date|date_format:Y-m-d',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Judul artikel harus diisi.',
            'title.string' => 'Judul artikel harus berupa string.',
            'title.max' => 'Panjang kalimat maksimal 100 karakter.',
            'date.required' => 'Tanggal artikel harus diisi.',
            'date.date' => 'Tanggal artikel tidak valid.',
            'date.date_format' => 'Format tanggal harus YYYY-MM-DD.',
            'description.required' => 'Deskripsi artikel harus diisi.',
            'description.string' => 'Deskripsi artikel harus berupa teks.',
            'content.required' => 'Konten artikel harus diisi.',
            'content.string' => 'Konten artikel harus berupa teks.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Article::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        session()->flash('articleSuccessAlert', 'Artikel berhasil ditambahkan.');

        return redirect()->route('article_admin.index')->with('success', 'Artikel berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article_admin)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'date' => 'required|date|date_format:Y-m-d',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Judul artikel harus diisi.',
            'title.string' => 'Judul artikel harus berupa string.',
            'title.max' => 'Panjang kalimat maksimal 100 karakter.',
            'date.required' => 'Tanggal artikel harus diisi.',
            'date.date' => 'Tanggal artikel tidak valid.',
            'date.date_format' => 'Format tanggal harus YYYY-MM-DD.',
            'description.required' => 'Deskripsi artikel harus diisi.',
            'description.string' => 'Deskripsi artikel harus berupa teks.',
            'content.required' => 'Konten artikel harus diisi.',
            'content.string' => 'Konten artikel harus berupa teks.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $imagePath = $article_admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $article_admin->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        session()->flash('articleSuccessAlert', "Artikel berhasil diperbarui.");

        return redirect()->route('article_admin.index')->with('success', "Artikel {$request->input('title')} berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article_admin)
    {
        $article_admin->delete();

        session()->flash('articleSuccessAlert', "Artikel berhasil dihapus.");

        return redirect()->route('article_admin.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
