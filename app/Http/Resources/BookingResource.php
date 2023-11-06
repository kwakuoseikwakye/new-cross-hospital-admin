<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "message" => $this->message,
            "date" => date("jS M Y H:i:s A", strtotime($this->booking_date)),
            "amount" => "GHS" . $this->amount,
            "service" => $this->desc,
            "status" => $this->status == "paid" ? "<span style='background-color: #28a74520; color: #28a745'>PAID</span>" : "<span style='background-color: #dc354520; color: #dc3545'>NOT PAID</span>"
        ];
    }
}
