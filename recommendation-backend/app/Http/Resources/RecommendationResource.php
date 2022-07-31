<?php

namespace App\Http\Resources;

use App\Http\Requests\RecommendationRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class RecommendationResource extends JsonResource
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
            'id' => $this->id,
            'status_id' => $this->status_id,
            'name' => $this->name,
            'cpf' => $this->cpf,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'status' => new StatusResource($this->status),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
