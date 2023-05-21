<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class collegestud extends Model
{
    use HasFactory;
     protected $table = 'roles';

    public function role():hasOne
    {
        return $this->hasOne(role::class);
    }
}
