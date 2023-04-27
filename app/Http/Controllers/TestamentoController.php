<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testamento;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getTestamento = Testamento::all();
        return $getTestamento;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $PostTestamento = Testamento::create($request->all());
       if($PostTestamento){
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
        $getIdTestamento = Testamento::find($id);
        if($getIdTestamento){
           //pegando o testamento com os livros pela n:1
           $response = [
              'Testamentos' => $getIdTestamento,
              'Livro'=> $getIdTestamento->livros
           ];
            return $getIdTestamento;
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
        $upDateTestamento = Testamento::findOrFail($id);
        if($upDateTestamento){
            $upDateTestamento->update($request->all());
            return $upDateTestamento;
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
        $deletTestamento = Testamento::destroy($id);
        if($deletTestamento){
            return response()->json([
                'mensagem' => 'Livro Deletado'
               ], 201);
          }
          return response()->json([
            'message' => 'Algo deu errado :('
           ], 404);
    }
}
