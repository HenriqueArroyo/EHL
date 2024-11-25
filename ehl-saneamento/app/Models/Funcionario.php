<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Funcionario extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'dataNascimento', 'id_gestor',
    ];

    protected $hidden = [
        'senha',
    ];

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

    public function gestor()
    {
        return $this->belongsTo(Gestor::class, 'id_gestor');
    }
}
