<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Definir a tabela associada ao modelo (opcional, pois o Laravel assume automaticamente o nome plural "materiais")
    protected $table = 'materiais';

    // Definir os campos que podem ser atribuídos em massa
    protected $fillable = [
        'nome', 'descricao', 'acesso',
    ];

    // Definir os campos que podem ser convertidos em JSON
    protected $casts = [
        'acesso' => 'boolean',  // Converte o valor de 'acesso' para booleano
    ];
}
