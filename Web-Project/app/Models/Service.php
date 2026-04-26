<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Tell Laravel your table name
    protected $table = 'service';

    // Tell Laravel your primary key
    protected $primaryKey = 'service_id';

    // Allow mass assignment
    protected $fillable = [
        'name',
        'duration',
        'price',
        'active_status'
    ];
}
