<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryContent;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = Client::latest()->get();

        if ($clients->isEmpty()) {
            return redirect()->route('client_admin.create')->with('clientAlert', 'Silakan buat klien baru.');
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
            'name' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama klien harus diisi.',
            'name.string' => 'Nama klien harus berupa string.',
            'name.max' => 'Panjang nama klien maksimal 50 karakter.',
            'image.required' => 'Logo klien harus diisi.',
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
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        HistoryContent::create([
            'user_id' => Auth::user()->id,
            'client_id' => Client::latest()->first()->id,
        ]);

        session()->flash('clientSuccessAlert', 'Klien berhasil diunggah dan disimpan.');

        return redirect()->route('client_admin.index')->with('success', 'Client created successfully.');
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
    public function update(Request $request, Client $client_admin)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama klien harus diisi.',
            'name.string' => 'Nama klien harus berupa string.',
            'name.max' => 'Panjang nama klien maksimal 50 karakter.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $imagePath = $client_admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $client_admin->update([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        session()->flash('clientSuccessAlert', "Klien berhasil diperbarui.");

        return redirect()->route('client_admin.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client_admin)
    {
        $client_admin->delete();

        session()->flash('clientSuccessAlert', "Klien berhasil dihapus.");

        return redirect()->route('client_admin.index')->with('success', 'Client deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $clients = Client::where('name', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.home.client.index', [
            'clients' => $clients,
            'searchQuery' => $query
        ]);
    }
}
