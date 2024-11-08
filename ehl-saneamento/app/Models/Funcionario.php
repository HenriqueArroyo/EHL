<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Funcionario extends Model
{
    use HasFactory;

    // Definir a tabela associada ao modelo
    protected $table = 'funcionarios';

    // Definir os campos que podem ser atribuídos em massa
    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'dataNascimento', 'id_gestor',
    ];

    // Definir os campos que devem ser ocultados quando o modelo for convertido em array ou JSON
    protected $hidden = [
        'senha',
    ];

    // Criar mutators para criptografar a senha antes de salvar
    public static function boot()
    {
        parent::boot();

        static::creating(function ($funcionario) {
            if ($funcionario->senha) {
                $funcionario->senha = Hash::make($funcionario->senha);
            }
        });

        static::updating(function ($funcionario) {
            if ($funcionario->senha) {
                $funcionario->senha = Hash::make($funcionario->senha);
            }
        });
    }

    // Definir o relacionamento com o modelo Gestor (um funcionário pertence a um gestor)
    public function gestor()
    {
        return $this->belongsTo(Gestor::class, 'id_gestor');
    }
}
