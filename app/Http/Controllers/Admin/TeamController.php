<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->get();

        if ($teams->isEmpty()) {
            return redirect()->route('team_admin.create')->with('teamAlert', 'Silakan buat anggota tim baru.');
        }

        return view('admin.home.team.index', compact('teams'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan halaman create tanpa membatasi akses
        return view('admin.home.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'position' => 'required|string|max:50',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama anggota tim harus diisi.',
                'position.required' => 'Posisi anggota tim harus diisi.',
                'position.max' => 'Panjang kalimat maksimal 50 karakter.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            ]
        );

        // Inisialisasi variabel penyimpanan gambar
        $imagePath = null;

        // Simpan gambar jika diunggah
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan data ke database
        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imagePath, // Pastikan variabel ini sudah ditentukan
        ]);

        session()->flash('teamSuccessAlert', 'Anggota tim berhasil diunggah dan disimpan.');

        return redirect()->route('team_admin.index')->with('success', 'Team member created successfully.');
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
    public function update(Request $request, Team $team_admin)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'position' => 'required|string|max:50',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Nama anggota tim harus diisi.',
                'position.required' => 'Posisi anggota tim harus diisi.',
                'position.max' => 'Panjang kalimat maksimal 50 karakter.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            ]
        );

        $imagePath = $team_admin->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $team_admin->update([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        session()->flash('teamSuccessAlert', "Anggota tim berhasil diperbarui.");

        return redirect()->route('team_admin.index')->with('success', "Team member updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team_admin)
    {
        $team_admin->delete();

        session()->flash('teamSuccessAlert', "Anggota tim berhasil dihapus.");

        return redirect()->route('team_admin.index')->with('success', "Team member deleted successfully.");
    }
}
