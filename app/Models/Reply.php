<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'autor'
    ];

    public function tweets()
    {
        //Un tweet tiene muchas respuestas
        return $this->hasMany(Tweet::class, 'user_id', 'id');
    }




}
