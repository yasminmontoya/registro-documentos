<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::all();
        return response()->json($documentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::find($id);
        return response()->json($documento);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response=[];
        $documento = Documento::find($id);
        if($documento){
            $documento->delete();
            array_push($response,['status'=>'success']);
        }else{
            array_push($response,['status'=>'error']);
            array_push($response,['errors'=>'No existe el id']);
        }
        return response()->json($response);
    }
}
