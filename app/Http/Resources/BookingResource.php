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
        if ($this->status == "paid") {
            $disableButton = "";
        }else {
            $disableButton = "hidden";
        }
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "message" => $this->message,
            "date" => date("jS M Y H:i:s A", strtotime($this->booking_date)),
            "amount" => "GHS " . $this->amount,
            "service" => $this->desc,
            "statusCheck" => $this->status,
            "visit" => strtoupper($this->visit),
            "status" => $this->status == "paid" ? "<span style='background-color: #28a74520; color: #28a745'>PAID</span>" : "<span style='background-color: #dc354520; color: #dc3545'>NOT PAID</span>",
            "action"=> "
            <div class='btn-group'>
                    <button  class='btn btn-outline-dark btn-sm dropdown-toggle' 
                        aria-haspopup='true' aria-expanded='false' 
                        data-bs-toggle='dropdown'>
                        <i class='fas fa-list-ul'></i> Action
                    </button>

                    <div class='dropdown-menu'>
                        <button class='btn btn-outline-dark btn-md dropdown-item booking-info-btn'>More Info  </button>
                        <button {$disableButton} class='btn btn-outline-dark btn-md dropdown-item update-status-btn'>Status Check </button>
                        <button class='btn btn-outline-dark btn-md dropdown-item send-reminder-btn'>Send Reminder </button>
                    </div>
            </div>
        "
        ];
    }
}
