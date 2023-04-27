<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getLivro = Livro::all();
        return $getLivro;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postLivro = Livro::create($request->all());
        if($postLivro){
           return response()->json([
            'mensagem' => 'Livro cadastrado'
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
        $getIdLivro = Livro::find($id);
         if($getIdLivro){
            //pegando o testamento com os livros pela 1:1
            $response = [
                'Livro' => $getIdLivro,
                'Testamento'=> $getIdLivro->testamento,
                'Versiculo'=>$getIdLivro->versiculo
             ];
           return $getIdLivro;
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
        $updateLivro = Livro::find($id);
        if($updateLivro){
        $updateLivro->update($request->all());
        return $updateLivro;
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
        $deleteLivro = Livro::destroy($id);
          if($deleteLivro){
            return response()->json([
                'mensagem' => 'Livro Deletado'
               ], 201);
          }
          return response()->json([
            'message' => 'Algo deu errado :('
           ], 404);
    }
}
