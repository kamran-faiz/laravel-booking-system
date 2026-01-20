<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function provider(){
        return $this->belongsTo(User::class,'provider_id');
    }
  
}
