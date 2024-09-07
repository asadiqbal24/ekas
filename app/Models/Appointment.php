<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table="appointments";
    protected $guarded=[];

    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }

    public function appointment_session_dates()
    {
        return $this->hasMany(\App\Models\AppointmentDate::class, 'appointment_id', 'id');
    }

}
