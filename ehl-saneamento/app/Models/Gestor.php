<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Gestor extends Model
{
    use HasFactory;

    // Definir a tabela associada ao modelo
    protected $table = 'gestores';

    // Definir os campos que podem ser atribuídos em massa
    protected $fillable = [
        'nome', 'cpf', 'email', 'senha',
    ];

    // Definir os campos que devem ser ocultados quando o modelo for convertido em array ou JSON
    protected $hidden = [
        'senha',
    ];

    // Criar um mutator para criptografar a senha antes de salvar
    public static function boot()
    {
        parent::boot();

        static::creating(function ($gestor) {
            if ($gestor->senha) {
                $gestor->senha = Hash::make($gestor->senha);
            }
        });

        static::updating(function ($gestor) {
            if ($gestor->senha) {
                $gestor->senha = Hash::make($gestor->senha);
            }
        });
    }
}
