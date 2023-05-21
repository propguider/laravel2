<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\relations\MorphToMany;
class view extends Model
{
    use HasFactory;
    protected $table = 'tags';
    public function tags():morphToMany
    {
        return $this->morphToMany(tag::class,'taggable');
    }
}
