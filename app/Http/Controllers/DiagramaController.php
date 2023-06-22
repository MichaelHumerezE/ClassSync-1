<?php

namespace App\Http\Controllers;

use App\Models\Diagrama;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDiagramaRequest;
use App\Http\Requests\UpdateDiagramaRequest;
use Illuminate\Database\QueryException;

class DiagramaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-diagrama|crear-diagrama|editar-diagrama|borrar-diagrama', ['only' => 'index']);
        $this->middleware('permission:ver-diagrama', ['only' => 'show']);
        $this->middleware('permission:crear-diagrama', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-diagrama', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-diagrama', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diagramas = Diagrama::select('*')->orderBy('id','ASC');
        $limit = (isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $diagramas = $diagramas->where('id','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%');
        }
        $diagramas = $diagramas->paginate($limit)->appends($request->all());
        return view('diagramas.index', compact('diagramas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diagramas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiagramaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiagramaRequest $request)
    {
        $diagrama = Diagrama::create($request->validated());
        return redirect()->route('diagramas.index')->with('mensaje', 'Diagrama Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagrama  $diagrama
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagrama = Diagrama::where('id', '=', $id)->firstOrFail();
        return view('diagramas.show', compact('diagrama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagrama  $diagrama
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagrama = Diagrama::where('id', '=', $id)->firstOrFail();
        return view('diagramas.edit', compact('diagrama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiagramaRequest  $request
     * @param  \App\Models\Diagrama  $diagrama
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiagramaRequest $request, $id)
    {
        $diagrama = Diagrama::find($id);
        $diagrama->update($request->validated());
        return redirect()->route('diagramas.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagrama  $diagrama
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagrama = Diagrama::findOrFail($id);
        try{
            $diagrama->delete();
            return redirect()->route('diagramas.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('diagramas.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
