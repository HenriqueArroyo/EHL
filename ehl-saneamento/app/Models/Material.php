<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Defina a tabela associada ao modelo
    protected $table = 'materiais';

    // Defina os campos que são atribuíveis em massa (fillable)
    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'acesso',
    ];

    // Defina os tipos de dados dos campos
    protected $casts = [
        'acesso' => 'boolean', // garante que 'acesso' seja tratado como booleano
    ];
}
