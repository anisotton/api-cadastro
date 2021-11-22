<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $seller = new SellerResource($this->seller);

        return [
            'id' => $this->id,
            'vendedor' => $seller,
            'valor_venda' => number_format($this->valor,2),
            'data' => date_format($this->created_at,'d/m/Y'),
            'comissao' => number_format(($seller->comissao/100) * $this->valor,2),
        ];
    }
}
