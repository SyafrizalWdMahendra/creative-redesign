<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();

        if ($contacts->isEmpty()) {
            return redirect()->route('contact.create')->with('teamAlert', 'Silakan buat kontak baru.');
        }

        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'contact' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email|max:50',
        ], [
            'location.required' => 'Lokasi harus diisi.',
            'location.string' => 'Lokasi harus berupa string.',
            'location.max' => 'Panjang maksimal 30 karakter.',
            'address.required' => 'Alamat harus diisi.',
            'address.string' => 'Alamat harus berupa string.',
            'address.max' => 'Panjang maksimal 255 karakter.',
            'contact.required' => 'Kontak harus diisi.',
            'contact.numeric' => 'Kontak harus berupa angka.',
            'contact.digits_between' => 'Panjang nomor kontak harus antara 10 sampai 13 digit.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Panjang email maksimal 50 karakter.',
        ]);


        Contact::create([
            'location' => $request->location,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        session()->flash('contactSuccessAlert', 'Kontak berhasil ditambahkan.');

        return redirect()->route('contact.index')->with('contactSuccessAlert', 'Kontak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'location' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'contact' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email|max:50',
        ], [
            'location.required' => 'Lokasi harus diisi.',
            'location.string' => 'Lokasi harus berupa string.',
            'location.max' => 'Panjang maksimal 30 karakter.',
            'address.required' => 'Alamat harus diisi.',
            'address.string' => 'Alamat harus berupa string.',
            'address.max' => 'Panjang maksimal 255 karakter.',
            'contact.required' => 'Kontak harus diisi.',
            'contact.numeric' => 'Kontak harus berupa angka.',
            'contact.digits_between' => 'Panjang nomor kontak harus antara 10 sampai 13 digit.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Panjang email maksimal 50 karakter.',
        ]);

        $contact->update([
            'location' => $request->location,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        session()->flash('contactSuccessAlert', 'Kontak berhasil diperbarui.');

        return redirect()->route('contact.index')->with('contactSuccessAlert', 'Kontak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        session()->flash('contactSuccessAlert', 'Kontak berhasil dihapus.');

        return redirect()->route('contact.index')->with('contactSuccessAlert', 'Kontak berhasil dihapus.');
    }
}
