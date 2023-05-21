<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class post extends Model
{
    protected $table = 'comments';

    use HasFactory;

    public function comments():hasMany
    {
        return $this->hasMany(comment::class,'post_id','id');
    }
}
