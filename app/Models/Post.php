<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Estos serían los campos que serán completados POR EL USUARIO para este recurso
    protected $fillable = [
        'title',
        'slug',
        'body'
    ];

    // La relación existe en la BD, pero Laravel no sabe aún, se debe indicar
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
