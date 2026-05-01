<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_name',
        'description',
        'price',
        'duration',
    ];

    // One service has many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Many-to-many with therapists
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class, 'service_therapist');
    }
}
