<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SotwSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'sotw_id',
        'mh',
        'date',
        'public',
        'twitter'
    ];

}
