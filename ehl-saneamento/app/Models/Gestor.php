<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class Gestor extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

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

    // Usar "password" como atributo para autenticação padrão do Laravel
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
