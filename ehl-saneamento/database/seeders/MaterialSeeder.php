<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserir materiais específicos no banco de dados
        Material::create([
            'nome' => 'Cadeira',
            'descricao' => 'Cadeira de escritório, modelo ergonômico.',
            'quantidade' => 30,
            'acesso' => true, // Acesso permitido
        ]);

        Material::create([
            'nome' => 'Mesa',
            'descricao' => 'Mesa de escritório de 1,80m, com gavetas.',
            'quantidade' => 20,
            'acesso' => true, // Acesso permitido
        ]);

        Material::create([
            'nome' => 'Computador',
            'descricao' => 'Computador de mesa com processador Intel i5 e 8GB de RAM.',
            'quantidade' => 15,
            'acesso' => false, // Acesso restrito
        ]);

        Material::create([
            'nome' => 'Impressora',
            'descricao' => 'Impressora laser monocromática HP.',
            'quantidade' => 5,
            'acesso' => true, // Acesso permitido
        ]);

        Material::create([
            'nome' => 'Projetor',
            'descricao' => 'Projetor Epson para apresentações.',
            'quantidade' => 2,
            'acesso' => false, // Acesso restrito
        ]);

        Material::create([
            'nome' => 'Quadro Branco',
            'descricao' => 'Quadro branco para apresentações e anotações.',
            'quantidade' => 10,
            'acesso' => true, // Acesso permitido
        ]);

        Material::create([
            'nome' => 'Câmera de Segurança',
            'descricao' => 'Câmera de segurança para monitoramento interno.',
            'quantidade' => 8,
            'acesso' => false, // Acesso restrito
        ]);

        Material::create([
            'nome' => 'Scanner',
            'descricao' => 'Scanner de documentos HP.',
            'quantidade' => 3,
            'acesso' => true, // Acesso permitido
        ]);

        Material::create([
            'nome' => 'Televisão',
            'descricao' => 'Televisão de 55 polegadas para salas de reunião.',
            'quantidade' => 4,
            'acesso' => true, // Acesso permitido
        ]);

        Material::create([
            'nome' => 'Ar Condicionado',
            'descricao' => 'Ar condicionado Split de 12000 BTUs.',
            'quantidade' => 6,
            'acesso' => false, // Acesso restrito
        ]);
    }
}
