<?php

namespace App\Http\Controllers;

use App\Models\Ranch;
use App\Models\User;
use Illuminate\Http\Request;

class RanchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ranches = Ranch::all();

        return view('ranch.index', ['ranches' => $ranches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = User::whereHas('role', function ($query) {
            $query->where('name', 'admin ranch');
        })->orderBy('name')->get();

        return view('ranch.create', ['owners' => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'regex:/^[0-9+\-\s]+$/', 'max:15'],
            'address' => ['required', 'string', 'min:3', 'max:255'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        Ranch::create($validated);

        return redirect()->route('ranches.index')->with('success', 'Rancho creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranch $ranch)
    {
        return view('ranch.show', ['ranch' => $ranch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranch $ranch)
    {
        $owners = User::whereHas('role', function ($query) {
            $query->where('name', 'admin ranch');
        })->orderBy('name')->get();

        return view('ranch.edit', ['ranch' => $ranch, 'owners' => $owners]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ranch $ranch)
    {
         $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'regex:/^[0-9+\-\s]+$/', 'max:15'],
            'address' => ['required', 'string', 'min:3', 'max:255'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        $ranch->update($validated);

        return redirect()->route('ranches.show', $ranch)->with('success', 'Rancho actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranch $ranch)
    {
        $ranch->delete();

        return redirect()->route('ranches.index')->with('success', 'Rancho eliminado correctamente.');
    }
}
