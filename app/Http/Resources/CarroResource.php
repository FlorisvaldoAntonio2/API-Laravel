<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'MODELO' => $this->modelo,
            'ANO' => $this->ano,
            'MONTADORA' => $this->montadora,
            'COR' => $this->cor,
            'PLACA' => $this->placa,
            'DT_CRIAÇÂO' => $this->created_at,
            'DT_ATUALIZAÇÂO' => $this->updated_at
        ];
    }
}
