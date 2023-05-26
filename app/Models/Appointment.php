<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded;

    function payment()
    {
        return $this->hasOne(Payment::class, 'appointment_id');
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
