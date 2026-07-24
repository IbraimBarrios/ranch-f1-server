<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

        return view('user-profile.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name' => ['required', 'string', 'min:3', 'max:100'],
            'second_last_name' => ['nullable', 'string', 'min:3', 'max:100'],
            'phone' => ['required', 'string', 'regex:/^[0-9+\-\s]+$/', 'max:15'],
            'birth_date' => ['required', 'date', 'before:today'],
            'address' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $validated['user_id'] = $user->id;

        Profile::create($validated);

        return redirect()->route('profile.show', $user)->with('success', 'Perfil creado correctamente.');


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $profile = $user->profile;

        return view('user-profile.show', ['user' => $user, 'profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $profile = $user->profile;

        return view('user-profile.edit', ['user' => $user, 'profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name' => ['required', 'string', 'min:3', 'max:100'],
            'second_last_name' => ['nullable', 'string', 'min:3', 'max:100'],
            'phone' => ['required', 'string', 'regex:/^[0-9+\-\s]+$/', 'max:15'],
            'birth_date' => ['required', 'date', 'before:today'],
            'address' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $user->profile->update($validated);

        return redirect()->route('profile.show', $user)->with('success', 'Perfil actualizado correctamente.');
    }
}
