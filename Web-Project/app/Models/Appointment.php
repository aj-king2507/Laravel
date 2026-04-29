<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_id',
        'therapist_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
