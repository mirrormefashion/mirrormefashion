<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

     protected $fillable=['message','user_id','receiver_id','is_seen'];
    public function user()
    {
    	return $this->belongsTo(App\User::class);
    }



}
