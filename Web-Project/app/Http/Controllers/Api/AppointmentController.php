<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Appointment::query();

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $appointment = $query->paginate(5);

        return response()->json([
        'status' => 'success',
        'data' => $appointment
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'customer_id' => 'required|integer',
        'therapist_id' => 'required|integer',
        'service_id' => 'required|integer',
        'start_datetime' => 'required|date',
        'end_datetime' => 'required|date|after:start_datetime',
        'status' => 'required|string',
        'notes' => 'nullable|string'
        ]);

        $appointment = Appointment::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment created successfully',
            'data' => $appointment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $appointment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'customer_id' => 'required|integer',
            'therapist_id' => 'required|integer',
            'service_id' => 'required|integer',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'status' => 'required|in:Booked,Cancelled,Completed',
            'notes' => 'nullable|string'
        ]);

        $appointment->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment updated successfully',
            'data' => $appointment
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment deleted successfully'
        ]);
    }
}
