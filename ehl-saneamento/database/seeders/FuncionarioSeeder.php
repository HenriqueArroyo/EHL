<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funcionarios')->insert([
            'nome' => 'Henrique Arroyo',
            'cpf' => '123.456.789-00',
            'email' => 'henrique@adm.com',
            'senha' => Hash::make('senha123'), // Use Hash::make para criptografar a senha
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
