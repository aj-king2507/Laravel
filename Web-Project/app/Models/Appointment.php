<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Table name (your custom naming)
    protected $table = 'Appointment';

    // Primary key
    protected $primaryKey = 'appointment_id';

    // Mass assignable fields
    protected $fillable = [
        'customer_id',
        'therapist_id',
        'service_id',
        'start_datetime',
        'end_datetime',
        'status',
        'notes',
        'changed_by'
    ];

    // Relationships (VERY IMPORTANT FOR MARKS)

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function therapist()
    {
        return $this->belongsTo(Therapist::class, 'therapist_id', 'therapist_id');
    }
}
