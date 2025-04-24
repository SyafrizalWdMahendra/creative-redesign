<?php

namespace App\Http\Controllers\Admin;

use App\Models\Study;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Study::latest()->get();

        if ($studies->isEmpty()) {
            return redirect()->route('study_admin.create')->with('teamAlert', 'Silakan buat bidang studi baru.');
        }

        return view('admin.study.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.study.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'title' => 'required|string|max:100',
                'content' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name cannot exceed 50 characters',
                'title.required' => 'Title is required',
                'title.string' => 'Title must be a string',
                'title.max' => 'Title cannot exceed 100 characters',
                'content.string' => 'Content must be a string',
                'image.image' => 'Image must be an image file',
                'image.mimes' => 'Image must be of type jpeg, png, jpg, gif, svg',
                'image.max' => 'Image size cannot exceed 2MB',
            ]
        );

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Study::create([
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        session()->flash('studySuccessAlert', "Bidang studi berhasil ditambahkan.");

        return redirect()->route('study_admin.index')->with('studySuccessAlert', 'Bidang studi berhasil ditambahkan.');
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
    public function update(Request $request, Study $study_admin)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'title' => 'required|string|max:100',
                'content' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a string',
                'name.max' => 'Name cannot exceed 50 characters',
                'title.required' => 'Title is required',
                'title.string' => 'Title must be a string',
                'title.max' => 'Title cannot exceed 100 characters',
                'content.string' => 'Content must be a string',
                'image.image' => 'Image must be an image file',
                'image.mimes' => 'Image must be of type jpeg, png, jpg, gif, svg',
                'image.max' => 'Image size cannot exceed 2MB',
            ]
        );

        $imagePath = $study_admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }



        $study_admin->update([
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        session()->flash('studySuccessAlert', "Bidang studi berhasil diperbarui.");

        return redirect()->route('study_admin.index')->with('studySuccessAlert', "Bidang studi berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Study $study_admin)
    {
        $study_admin->delete();

        session()->flash('studySuccessAlert', "Bidang studi berhasil dihapus.");

        return redirect()->route('study_admin.index')->with('studySuccessAlert', "Bidang studi berhasil dihapus.");
    }
}
