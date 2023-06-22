<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Models\Diagrama;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagrama = Diagrama::FindOrFail($id);
        $equipos = Equipo::where('id_diagrama', $id)->paginate(10);
        $users = User::get();
        return view('equipos.index', compact('users', 'diagrama', 'equipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::get();
        $diagrama = Diagrama::FindOrFail($id);
        return view('equipos.edit', compact('users', 'diagrama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipoRequest  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipoRequest $request, $id)
    {
        $equipo = Equipo::create($request->validated());
        return redirect()->route('equipos.show', $equipo->id_diagrama)->with('mensaje', 'user Agregado Con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $id_diagrama = $equipo->id_diagrama;
        try {
            $equipo->delete();
            return redirect()->route('equipos.show', $id_diagrama)->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('equipos.show', $id_diagrama)->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
