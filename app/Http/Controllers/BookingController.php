<?php

namespace App\Http\Controllers;

use App\SMS\Arkesel as Sms;
use App\Http\Resources\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = date("Y-m-d");
        $booking = DB::table("booking")->select("booking.*", "services.code", "services.desc")
            ->join("services", "booking.service_code", "services.code")
            ->whereDate("booking_date", $today)
            ->orderByDesc("booking.booking_date")
            ->get();

        return response()->json([
            "data" => BookingResource::collection($booking)
        ]);
    }

    public function allBooking()
    {
        $booking = DB::table("booking")->select("booking.*", "services.code", "services.desc")
            ->join("services", "booking.service_code", "services.code")
            ->orderByDesc("booking.booking_date")
            ->get();

        return response()->json([
            "data" => BookingResource::collection($booking)
        ]);
    }

    public function filterAllBooking($from, $to)
    {
        $booking = DB::table("booking")->select("booking.*", "services.code", "services.desc")
            ->join("services", "booking.service_code", "services.code")
            ->whereBetween("booking_date", [$from, $to])
            ->orderByDesc("booking.booking_date")
            ->get();

        return response()->json([
            "data" => BookingResource::collection($booking)
        ]);
    }

    public function checkVisit($id)
    {
        if (empty($id)) {
            return response()->json([
                "status" => false
            ]);
        }
        DB::table("booking")->where("id", $id)->update([
            'visit' => "yes",
        ]);

        return response()->json([
            "status" => true
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "phone" => "required",
            "id" => "required",
            "messageBody" => "required",
            "messageType" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "msg" => join(" ", $validator->errors()->all()),
            ]);
        }

        switch (strtolower($request->messageType)) {
            case "sms":
                $sms = new Sms("NC-HOSPITAL", env("ARKESEL_SMS_API_KEY"));
                $res = $sms->send($request->phone, $request->messageBody);
                Log::info($res);
                return response()->json([
                    "status" => true,
                    "msg" => "Response from sms",
                ]);

                break;
            case "push":
                // $firebase = FirebaseController::getReference();
                // if ($firebase->getReference("Users/{$request->patientCode}/id")->getSnapshot()->exists()) {
                //     $userID = $firebase->getReference("Users/{$request->patientCode}")->getValue()["id"];
                //     $firebase->getReference("Notifications/{$userID}")->push([
                //         "from" => "back_office",
                //         "title" => $request->messageTitle,
                //         "message" => $request->messageBody,
                //         "screen" => "general_notification",
                //     ]);
                // }
                break;
        }
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
