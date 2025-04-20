<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Team;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = Client::latest()->get();

        if ($clients->isEmpty()) {
            return redirect()->route('client.create')->with('clientAlert', 'Silakan buat klien baru.');
        }

        return view('admin.home.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input file
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Cek apakah ada file yang diunggah
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan file dan dapatkan path-nya
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan data ke database
        Client::create([
            'image' => $imagePath,
        ]);

        session()->flash('clientSuccessAlert', 'Klien berhasil diunggah dan disimpan.');

        return redirect()->route('client.index')->with('success', 'Client created successfully.');
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
