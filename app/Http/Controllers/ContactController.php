<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{

    public function index()
    {
        return view('contacts.index', [
            'title' => 'Contact',
        ]);
    }
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts|max:255',
            'kontak' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        // Simpan data ke database
        $contact = Contact::create($validatedData);

        // Redirect atau response lainnya sesuai kebutuhan
        return redirect('/contacts')->with('success', 'Pesan telah terkirim!');
    }
}
