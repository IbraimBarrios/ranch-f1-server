<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('role.index', ["roles" => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string', 'max:255']
        ]);

        Role::create($validated);

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);

        return view('role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $canEditName = $role->users()->exists();

        return view('role.edit', ['role' => $role, 'canEditName' => $canEditName]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string', 'max:255']
        ]);

        $role = Role::findOrFail($id);

        if ($role->users()->exists() && $role->name !== $request->name) {
            return back()->withErrors([
                'name' => 'No se puede modificar el nombre de un rol que ya está asignado.',
            ]);
        }

        $role->update($validated);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->users()->exists()) {
            return redirect()
                ->route('roles.index')
                ->with('error', 'No se puede eliminar el rol porque tiene usuarios asignados.');
        }

        $role->delete();
        
        return redirect()->route('roles.index');
    }
}
