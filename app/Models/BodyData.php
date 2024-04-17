<?php

namespace App\Models;

use App\BodyStat;
use App\User;
use Illuminate\Database\Eloquent\Model;

class BodyData extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function body_stat(){
        return $this->hasOne(BodyStat::class,'body_data_id');
    }
}
