<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    // Definindo a tabela associada ao modelo (não é necessário se o nome da tabela for o plural do modelo)
    protected $table = 'solicitacoes';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'id_funcionario',
        'id_material',
        'dataSolicitacao',
        'quantidade',
        'status',
        'dataDevolucao',
    ];

    // Definindo o relacionamento com o modelo Funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    // Definindo o relacionamento com o modelo Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }

    // Relacionamento para a data de devolução (pode ser null)
    protected $casts = [
        'dataDevolucao' => 'date', // Fazendo o cast para o tipo date
    ];
}
