<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarroRequest;
use App\Http\Resources\CarroCollectionResource;
use App\Http\Resources\CarroResource;
use App\Models\Carro;
use Exception;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        return new CarroCollectionResource(Carro::paginate(50));
    }

    public function show(int $id)
    {
        try
        {
            $carro = Carro::findOrFail($id);
        }
        catch(Exception $ex)
        {
            return response()->json([
                'status' => false,
                'mensagem' => "Erro ao encontrar o carro"
            ],  400);
        }
        return new CarroResource($carro);
    }

    public function store(CarroRequest $request)
    {
        try
        {
            $carro = $request->all();
            $resultado = Carro::create($carro);
        }
        catch(Exception $ex)
        {
            return response()->json([
                'status' => false,
                'mensagem' => "Erro no cadastro!!!"
            ],  500);
        }
        
        return response()->json([
            'status' => true,
            'mensagem' => "Cadastrado com sucesso!!!",
            'data' => $resultado
        ],  201);
    }

    public function destroy(int $id)
    {
        try{
            $carro = Carro::findOrFail($id);
            $carro->delete();
        }
        catch(Exception $ex)
        {
            return response()->json([
                'status' => false,
                'mensagem' => "Erro ao encontrar o carro"
            ],  400);
        }

        return response()->json([
            'status' => true,
            'mensagem' => "Deletado com sucesso!!!"
        ], 200);
    }

    public function update(CarroRequest $request, int $id)
    {
        try{
            $carro = Carro::findOrfail($id);
            $carro->fill($request->all());
            $carro->save();
        }
        catch(Exception $ex)
        {
            return response()->json([
                'status' => false,
                'mensagem' => "Erro ao encontrar o carro - ({$ex->getMessage()})"
            ],  400);
        }
        
        return response()->json([
            'status' => true,
            'mensagem' => "Atualizado com sucesso!!!"
        ], 200);
    }
}
