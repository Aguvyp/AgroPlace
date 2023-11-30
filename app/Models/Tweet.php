<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'autor'
    ];


    public function user()
    {
        //Los tweets pertenecen a un user
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replies()
    {
        //Muchas respuestas perteneces a un tweet
        return $this->hasMany(Reply::class);
    }
}
