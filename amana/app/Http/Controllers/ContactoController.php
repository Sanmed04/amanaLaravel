<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|min:2|max:255',
            'message' => 'required|string',
        ]);

        
        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
