<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MediaUpload extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'file_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
