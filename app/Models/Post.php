<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // La relación existe en la BD, pero Laravel no sabe aún, se debe indicar
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
