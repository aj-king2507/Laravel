<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    // One therapist has many appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Many-to-many with services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_therapist');
    }
}
