<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    // Definir a tabela associada ao modelo (opcional, já que o Laravel usa o plural automaticamente)
    protected $table = 'solicitacoes';

    // Definir os campos que podem ser atribuídos em massa
    protected $fillable = [
        'id_funcionario', 'id_material', 'dataSolicitacao', 'quantidade', 'status', 'dataDevolucao',
    ];

    // Definir os relacionamentos com os modelos Funcionario e Material
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }
}
