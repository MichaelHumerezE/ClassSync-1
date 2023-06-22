<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-user|crear-user|editar-user|borrar-user', ['only' => 'index']);
        $this->middleware('permission:ver-user', ['only' => 'show']);
        $this->middleware('permission:crear-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select('*')->orderBy('id','ASC');
        $limit = (isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $users = $users->where('id','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('apellidos','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
            ->orWhere('ci','like','%'.$request->search.'%')
            ->orWhere('sexo','like','%'.$request->search.'%')
            ->orWhere('phone','like','%'.$request->search.'%')
            ->orWhere('domicilio','like','%'.$request->search.'%')
            ->orWhere('estado','like','%'.$request->search.'%');
        }
        $users = $users->paginate($limit)->appends($request->all());
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->validate($request, ['roles' => 'required']);
        $user = User::create($request->validated());
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('mensaje', 'user Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        $roles = Role::pluck('name', 'name')->all();
        $empRole = $user->roles->pluck('name', 'name')->all();
        return view('users.show', compact('user', 'roles', 'empRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        $roles = Role::pluck('name', 'name')->all();
        $empRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'empRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validated());
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try{
            $user->delete();
            return redirect()->route('users.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('users.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
