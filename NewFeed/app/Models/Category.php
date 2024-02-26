<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Category extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'category';

    protected $fillable = [
        'id',
=======
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description'
>>>>>>> 4cd14aaba2b9571e120af2ca68cc52066d289175
    ];
}
