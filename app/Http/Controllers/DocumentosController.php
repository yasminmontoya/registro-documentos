<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Proceso;
use App\Models\Tipo;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index',compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=Tipo::all();
        $procesos=Proceso::all();
        return view('documentos.create',compact('tipos','procesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = Tipo::findOrFail($request->tipo);
        $proceso = Proceso::findOrFail($request->proceso);
        $id = Documento::latest('id')->first()->id + 1;

        $documento = new Documento();
        $documento->nombre=$request->nombre;
        $documento->codigo=$tipo->prefijo . "-" . $proceso->prefijo . "-" . $id;
        $documento->contenido=$request->contenido;
        $documento->tipo_id=$request->tipo;
        $documento->proceso_id=$request->proceso;
        $documento->save();

        return back()->with('success', 'Documento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::findOrFail($id);
        $tipos=Tipo::all();
        $procesos=Proceso::all();
        return view('documentos.edit', compact('documento','tipos','procesos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'unique:documentos'
        ]);

        $documento = Documento::find($id);
        $documento->nombre=$request->nombre;
        $documento->codigo=$request->codigo;
        $documento->contenido=$request->contenido;
        $documento->tipo_id=$request->tipo;
        $documento->proceso_id=$request->proceso;
        $documento->save();

        return back()->with('success', 'Documento editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento=Documento::findOrFail($id);
        $documento->delete();

        return redirect('/documentos')->with('success','Documento Eliminado');
    }
}
