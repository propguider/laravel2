<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasManyThrough;

class category extends Model
{
    use HasFactory;
    protected $table ='items';

    public function items():hasManyThrough
    {
        return $this->hasManyThrough(item::class,type::class);

    }


}
