<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penumpangs(){
        return $this->hasMany('App\Models\Penumpang');
    }
}

