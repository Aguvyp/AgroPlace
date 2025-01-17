<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'message'
    ];

    public function tweets()
    {
        //Un tweet tiene muchas respuestas
        return $this->belongsTo(Tweet::class, 'tweet_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }




}
