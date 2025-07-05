<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados
    protected $table = 'usuarios_cad';

    // Define os campos que podem ser preenchidos em massa (mass assignable)
    protected $fillable = [
        'name',
        'age',
        'email',
    ];
}
