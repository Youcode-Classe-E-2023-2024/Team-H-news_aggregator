<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Category extends Model
{
    use HasFactory;


    protected $table = 'categories';


    protected $fillable = [
        'name',
        'description',
        'id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
