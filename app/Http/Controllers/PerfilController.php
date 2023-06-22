<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class PerfilController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()) {
            return view('home.index');
        }
    }

    public function edit($id)
    {
        $perfil = User::where('id', '=', $id)->firstOrFail();
        return view('perfil.edit', compact('perfil'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $perfil = User::find($id);
        $perfil->update($request->validated());
        return redirect()->route('perfil.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }
}
