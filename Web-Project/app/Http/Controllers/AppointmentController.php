<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['customer', 'therapist', 'service'])
            ->latest()
            ->paginate(5);

        return view('appointments.index', compact('appointments'));
    }
}
