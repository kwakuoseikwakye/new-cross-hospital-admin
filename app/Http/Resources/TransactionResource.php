<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "code" => $this->transaction,
            "name" => $this->name,
            "email" => $this->email,
            // "phone" => $this->phone,
            "date" => date("jS F Y H:i:s A",strtotime($this->created_at)),
            "amount" => "GHS".$this->amount,
            "status" => $this->status == "success" ? "<span style='background-color: #28a74520; color: #28a745'>SUCCESS</span>" : "<span style='background-color: #dc354520; color: #dc3545'>{$this->status}</span>"
        ];
    }
}
