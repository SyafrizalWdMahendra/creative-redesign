<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();

        if ($services->isEmpty()) {
            return redirect()->route('service_admin.create')->with('teamAlert', 'Silakan buat layanan baru.');
        }

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
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
                'title' => 'required|string|max:100',
                'description' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Nama layanan harus diisi.',
                'name.string' => 'Nama layanan harus berupa string.',
                'name.max' => 'Panjang kalimat maksimal 50 karakter.',
                'title.required' => 'Judul harus diisi.',
                'title.string' => 'Judul layanan harus berupa string.',
                'title.max' => 'Panjang kalimat maksimal 100 karakter.',
                'description.required' => 'Deskripsi harus diisi.',
                'description.string' => 'Deskripsi harus berupa string.',
                'content.required' => 'Konten harus diisi.',
                'content.string' => 'Konten harus berupa string.',
                'image.required' => 'Foto sampul harus diisi.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            ]
        );

        // Inisialisasi variabel penyimpanan gambar
        $imagePath = null;

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('image')) {
            // Simpan file dan dapatkan path-nya
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan data ke database
        Service::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        session()->flash('serviceSuccessAlert', "Layanan berhasil ditambahkan.");

        return redirect()->route('service_admin.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service_admin)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'title' => 'nullable|string|max:100',
                'description' => 'nullable|string',
                'content' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Nama layanan harus diisi.',
                'name.string' => 'Nama layanan harus berupa string.',
                'name.max' => 'Panjang kalimat maksimal 50 karakter.',
                'title.string' => 'Judul layanan harus berupa string.',
                'title.max' => 'Panjang kalimat maksimal 100 karakter.',
                'description.string' => 'Deskripsi harus berupa string.',
                'content.string' => 'Konten harus berupa string.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            ]
        );

        $imagePath = $service_admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $title = $request->filled('title') ? $request->title : null;

        $service_admin->update([
            'name' => $request->name,
            'title' => $title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        session()->flash('serviceSuccessAlert', "Layanan berhasil diperbarui.");

        return redirect()->route('service_admin.index')->with('success', "Layanan berhasil diperbarui.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service_admin)
    {
        $service_admin->delete();

        session()->flash('serviceSuccessAlert', "Layanan berhasil dihapus.");

        return redirect()->route('service_admin.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
