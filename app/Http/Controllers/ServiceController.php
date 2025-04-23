<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();

        if ($services->isEmpty()) {
            return redirect()->route('service.create')->with('teamAlert', 'Silakan buat layanan baru.');
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

        return redirect()->route('service.index')->with('success', 'Layanan berhasil ditambahkan.');
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
    public function update(Request $request, Service $service)
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

        // Simpan gambar jika diunggah, jika tidak gunakan gambar lama
        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan konten jika ada video
        $content = $service->content;
        if ($request->video) {
            preg_match('/<iframe.*?src=\"(.*?)\".*?><\/iframe>/', $request->content, $matches);
            $content = $matches[1] ?? null;
        }

        // Pastikan jika `title` kosong, tetap diperbarui sebagai `null`
        $title = $request->filled('title') ? $request->title : null;

        // Update data layanan
        $service->update([
            'name' => $request->name,
            'title' => $title,
            'description' => $request->description,
            'content' => $content,
            'image' => $imagePath,
        ]);

        session()->flash('serviceSuccessAlert', "Layanan berhasil diperbarui.");

        return redirect()->route('service.index')->with('success', "Layanan berhasil diperbarui.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        session()->flash('serviceSuccessAlert', "Layanan berhasil dihapus.");

        return redirect()->route('service.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
