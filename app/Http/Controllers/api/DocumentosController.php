<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use Illuminate\Support\Facades\Validator;
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
        $response=[];
        $validate = $this->validator($request->all());
        if(!is_array($validate)){
            Documento::create($request->all());
            array_push($response,['status'=>'success']);
            return response()->json($response);
        }else{
            return response()->json($validate);
        }

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
        $response=[];
        $validate = $this->validator($request->all());
        if(!is_array($validate)){
            $documento = Documento::find($id);
            if($documento){
                $documento->fill($request->all())->save();
                array_push($response,['status'=>'success']);
            }else{
                array_push($response,['status'=>'error']);
                array_push($response,['errors'=>'No existe el id']);
            }
            return response()->json($response);
        }else{
            return response()->json($validate);
        }
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

    /**
     * Get a validator for an incoming documento request.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function validator(array $data)
    {
        $response=[];
        $validation = Validator::make($data, [
            'nombre' => 'required|max:60',
            'codigo' => 'required|unique:documentos',
            'contenido' => 'required|max:4000',
            'tipo_id' => 'required',
            'proceso_id' => 'required'
        ]);

        if($validation->fails()){
            array_push($response,['status'=>'error']);
            array_push($response,['errors'=>$validation->errors()]);
            return $response;
        }else{
            return true;
        }
    }
}
