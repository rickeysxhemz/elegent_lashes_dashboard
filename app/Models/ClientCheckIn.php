<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCheckIn extends Model
{
    use HasFactory;
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id','id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id','id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id','id');
    }
    public function client_technician()
    {
        return $this->hasMany(ClientCheckInTechnician::class, 'client_check_in_id','id');
    }
    public function client_detail()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

}
