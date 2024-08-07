<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'views', 'comments', 'likes'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
