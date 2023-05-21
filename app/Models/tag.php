<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\relations\MorphToMany;
class tag extends Model
{
    use HasFactory;
    protected $table = 'tags';

   public function sends():morphToMany
    {
return $this->morphedByMany(send::class,'taggable');
    }

    public function views():morphToMany
    {
        return $this->morphedByMany(view::class,'taggable');
    }
}
