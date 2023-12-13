<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function latestCheckIn()
    {
        return $this->hasOne(ClientCheckIn::class, 'client_id', 'id');
    }
    
}
