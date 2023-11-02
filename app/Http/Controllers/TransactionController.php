<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $data = DB::table("transactions")->select("transactions.*","booking.name")
        ->join("booking","booking.email","transactions.email")
        ->get();

        return response()->json([
            "data" =>TransactionResource::collection($data)
        ]);
    }
}
