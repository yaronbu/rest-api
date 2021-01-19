<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    //use HasFactory;
    protected $fillable = [
            'content',
            'language',
            'title',
            'author',
            'private',
            'active',
            'secret'
        ];

    protected $hidden = [
            'secret'
        ];
}
