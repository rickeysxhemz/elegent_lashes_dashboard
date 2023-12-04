<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationUser extends Model
{
    use HasFactory;
    // LocationUser model
        public function location()
        {
            return $this->belongsTo(Location::class, 'location_id','id');
        }
        public function manager()
        {
            return $this->belongsTo(User::class, 'user_id','id');
        }
}
