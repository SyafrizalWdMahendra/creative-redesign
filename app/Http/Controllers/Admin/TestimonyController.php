<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonies = Testimony::latest()->get();

        if ($testimonies->isEmpty()) {
            return redirect()->route('testimony_admin.create')->with('teamAlert', 'Silakan buat testimoni baru.');
        }

        return view('admin.testimony.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimony.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'comment' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|string',
        ], [
            'name.required' => 'Nama testimoni harus diisi.',
            'name.string' => 'Nama testimoni harus berupa string.',
            'name.max' => 'Panjang kalimat maksimal 50 karakter.',
            'comment.required' => 'Komentar testimoni harus diisi.',
            'comment.string' => 'Komentar testimoni harus berupa teks.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'video.string' => 'Video harus berupa string.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Filter hanya URL dari iframe Summernote
        $videoEmbed = null;
        if ($request->video) {
            preg_match('/<iframe.*?src=\"(.*?)\".*?><\/iframe>/', $request->video, $matches);
            $videoEmbed = $matches[1] ?? null;
        }

        Testimony::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $imagePath,
            'video' => $videoEmbed,
        ]);

        session()->flash('testimonySuccessAlert', 'Testimoni berhasil diunggah dan disimpan.');

        return redirect()->route('testimony_admin.index')->with('success', 'Testimoni created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Testimony $testimony_admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimony $testimony_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimony $testimony_admin)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'comment' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|string',
        ], [
            'name.required' => 'Nama testimoni harus diisi.',
            'name.string' => 'Nama testimoni harus berupa string.',
            'name.max' => 'Panjang kalimat maksimal 50 karakter.',
            'comment.required' => 'Komentar testimoni harus diisi.',
            'comment.string' => 'Komentar testimoni harus berupa teks.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'video.string' => 'Video harus berupa string.',
        ]);

        $imagePath = $testimony_admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Filter hanya URL dari iframe Summernote
        $videoEmbed = $testimony_admin->video;
        if ($request->video) {
            preg_match('/<iframe.*?src=\"(.*?)\".*?><\/iframe>/', $request->video, $matches);
            $videoEmbed = $matches[1] ?? null;
        }

        $testimony_admin->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $imagePath,
            'video' => $videoEmbed,
        ]);

        session()->flash('testimonySuccessAlert', "Testimoni berhasil diperbarui.");

        return redirect()->route('testimony_admin.index')->with('success', "Testimoni berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimony $testimony_admin)
    {
        if ($testimony_admin->image) {
            Storage::disk('public')->delete($testimony_admin->image);
        }

        $testimony_admin->delete();

        session()->flash('testimonySuccessAlert', "Testimoni berhasil dihapus.");

        return redirect()->route('testimony_admin.index')->with('success', "Testimoni berhasil dihapus.");
    }
}
