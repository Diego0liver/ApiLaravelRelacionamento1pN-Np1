<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Versiculo;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getVersiculo = Versiculo::all();
        return $getVersiculo;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $PostVersiculo = Versiculo::create($request->all());
        if($PostVersiculo){
            return response()->json([
             'mensagem' => 'Versiculo cadastrado'
            ], 201);
         }
         return response()->json([
             'Erro' => 'Algo deu errado :('
            ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getIdVersiculo = Versiculo::findOrFail($id);
        if($getIdVersiculo){
            $response = [
                'Versiculo' => $getIdVersiculo,
                'Livro'=> $getIdVersiculo->livro
             ];
            return $getIdVersiculo;
          }
          return response()->json([
             'message' => 'Algo deu errado :('
            ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateVersiculo = Versiculo::findOrFail($id);
        if($updateVersiculo){
            $updateVersiculo->update($request->all());
            return $updateVersiculo;
        }
        return response()->json([
            'message' => 'Algo deu errado :('
           ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletVersiculo = Versiculo::destroy($id);
        if($deletVersiculo){
            return response()->json([
                'mensagem' => 'Livro Deletado'
               ], 201);
          }
          return response()->json([
            'message' => 'Algo deu errado :('
           ], 404);
    }
}
