<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HistoryContent;
use Illuminate\Support\Facades\Auth;

class StudentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentWorks = StudentWork::latest()->get();

        if ($studentWorks->isEmpty()) {
            return redirect()->route('student_work_admin.create')->with('teamAlert', 'Silakan buat karya siswa baru.');
        }

        return view('admin.study_work.index', compact('studentWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.study_work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|string',
            ],
            [
                'name.required' => 'Nama karya siswa harus diisi.',
                'name.string' => 'Nama karya siswa harus berupa string.',
                'name.max' => 'Panjang kalimat maksimal 50 karakter.',
                'image.required' => 'Foto karya harus diisi.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'description.required' => 'Deskripsi harus diisi.'
            ]
        );

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        StudentWork::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        HistoryContent::create([
            'user_id' => Auth::user()->id,
            'student_work_id' => StudentWork::latest()->first()->id,
        ]);

        session()->flash('studentSuccessAlert', 'Karya siswa berhasil diunggah dan disimpan.');

        return redirect()->route('student_work_admin.index')->with('success', 'Karya siswa berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentWork $studentWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentWork $studentWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentWork $student_work_admin)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|string',
            ],
            [
                'name.required' => 'Nama karya siswa harus diisi.',
                'name.string' => 'Nama karya siswa harus berupa string.',
                'name.max' => 'Panjang kalimat maksimal 50 karakter.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, atau svg.',
                'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            ]
        );

        $imagePath = $student_work_admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $student_work_admin->update([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        session()->flash('studentSuccessAlert', 'Karya siswa berhasil diperbarui.');

        return redirect()->route('student_work_admin.index')->with('success', 'Karya siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentWork $student_work_admin)
    {
        $student_work_admin->delete();

        session()->flash('studentSuccessAlert', 'Karya siswa berhasil dihapus.');

        return redirect()->route('student_work_admin.index')->with('success', 'Karya siswa berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $studentWorks = StudentWork::where('name', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.study_work.index', [
            'studentWorks' => $studentWorks,
            'searchQuery' => $query
        ]);
    }
}
