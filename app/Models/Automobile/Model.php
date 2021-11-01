<?php

namespace App\Models\Automobile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    use HasFactory;

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
