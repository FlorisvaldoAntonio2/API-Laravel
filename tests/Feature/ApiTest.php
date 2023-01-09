<?php

namespace Tests\Feature;

use App\Models\Carro;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiTest extends TestCase
{
    // Página de referência: https://laravel.com/docs/9.x/database-testing#main-content
    // Página de referência asserts HTTP: https://laravel.com/docs/9.x/http-tests
    use RefreshDatabase; //limpa o banco a cada bateria de testes.

    public function test_get_all_cars()
    {
        Carro::factory(10)->create(); //usando a factory, criamos 5 carros.
        $response = $this->get('/api/carros'); //fazemos a requisição para o endpoint da API.
        $response->assertStatus(200) //confirmamos se a resposta é 200 (http status).
            ->assertJsonCount(10, 'data'); //verifica se no atributo data, tem 5 registros de carros
        $this->assertDatabaseCount('carros', 10); //verificamos se no banco temos 5 registros na tabela carros.
        
    }

    public function test_get_car()
    {
        Carro::factory(2)->create();
        $carro = Carro::all(['id'])->first();
        $response = $this->get("/api/carros/$carro->id");
        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereType('data.ID',"integer")
                ->whereType('data.MODELO',"string")
                ->whereType('data.ANO', "string")
                ->whereType('data.MONTADORA',"string")
                ->whereType('data.COR', 'string')
                ->whereType('data.PLACA', 'string')
        );
        // $response->dd(); //para debug
    }

    public function test_get_car_not_exists()
    {
        $id_rand = rand(999,10000);
        $response = $this->get("/api/carros/$id_rand");
        $response->assertStatus(400)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status',false)
                ->where('mensagem',"Erro ao encontrar o carro")
        );
    }

    public function test_add_car()
    {
        $response = $this->post('/api/carros', 
            [
                "modelo" => "classic",
                "ano" => "2022",
                "montadora" => "GM Brasil",
                "cor" => "branco",
                "placa" => "aaa-1234"
            ]
        );
       
        $response->assertStatus(201)->assertJson(fn (AssertableJson $json) =>
            $json->where('status',true)
                ->where('mensagem',"Cadastrado com sucesso!!!")
                ->has('data', fn ($json) => 
                    $json->where('modelo',"classic")
                    ->where('ano', "2022")
                    ->where('montadora',"GM Brasil")
                    ->where('cor', 'branco')
                    ->where('placa', 'aaa-1234')
                    ->etc() //não verifica os demais atributos
                )
        );
    }

    public function test_delete_car()
    {
        Carro::factory(2)->create();
        $carro = Carro::all()->first();
        $response = $this->delete("/api/carros/$carro->id");
        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status',true)
                    ->where('mensagem',"Deletado com sucesso!!!")
        );
    }

    public function test_delete_car_not_exists()
    {
        $id_rand = rand(999,10000);
        $response = $this->delete("/api/carros/$id_rand");
        $response->assertStatus(400)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status',false)
                ->where('mensagem',"Erro ao encontrar o carro")
            );
    }
}
