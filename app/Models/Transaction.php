<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    public function transaction_details()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'transaction_id');
    }
}
