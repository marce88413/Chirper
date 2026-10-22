<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('home', ['chirps' => $chirps]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => '¡Escribe algo para publicar!',
            'message.string' => 'El mensaje debe ser texto.',
            'message.max' => 'El mensaje debe tener como máximo 255 caracteres.',
        ]);

        Chirp::create([
            'message' => $validated['message'],
        ]);

        return redirect('/')->with(
            'success',
            '¡Tu publicación se ha guardado!'
        );
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => '¡Escribe algo para publicar!',
            'message.string' => 'El mensaje debe ser texto.',
            'message.max' => 'El mensaje debe tener como máximo 255 caracteres.',
        ]);

        $chirp->update($validated);

        return redirect('/')->with(
            'success',
            '¡La publicación se ha actualizado!'
        );
    }

    public function destroy(Chirp $chirp)
    {
        $chirp->delete();

        return redirect('/')->with(
            'success',
            '¡La publicación se ha eliminado!'
        );
    }
}