<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCheckInTechnician extends Model
{
    use HasFactory;

    public function clientCheckIn()
    {
        return $this->belongsTo(ClientCheckIn::class, 'client_check_in_id', 'id');
    }
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }
    
}
