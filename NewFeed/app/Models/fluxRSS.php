<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fluxRSS extends Model
{
    use HasFactory;

    protected $table = 'flex_rss';

    protected $fillable = [
        'name',
        'url',
    ];
}
