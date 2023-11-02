<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = date("Y-m-d");
        $booking = DB::table("booking")->select("booking.*", "services.*")
            ->join("services", "booking.service_code", "services.code")
            ->whereDate("booking_date", $today)
            ->get();

        return response()->json([
            "data" => BookingResource::collection($booking)
        ]);
    }

    public function allBooking()
    {
        $booking = DB::table("booking")->select("booking.*", "services.*")
            ->join("services", "booking.service_code", "services.code")
            ->get();

        return response()->json([
            "data" => BookingResource::collection($booking)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
