<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'parent_module',
        'parent_id',
        'image_name',
        'path',
        'file_name'
    ];

}

