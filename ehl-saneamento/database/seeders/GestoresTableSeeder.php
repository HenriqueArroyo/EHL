<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GestoresTableSeeder extends Seeder
{
    public function run()
    {
        // Dados do gestor padrão
        DB::table('gestores')->insert([
            'nome' => 'Henrique Arroyo',
            'cpf' => '123.456.789-00',
            'email' => 'henrique@adm.com',
            'senha' => Hash::make('senha123'), // Use Hash::make para criptografar a senha
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         // Dados do gestor padrão
         DB::table('gestores')->insert([
            'nome' => 'Eduardo Ananias',
            'cpf' => '123.456.789-61',
            'email' => 'eduardo@adm.com',
            'senha' => Hash::make('senha123'), // Use Hash::make para criptografar a senha
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('gestores')->insert([
            'nome' => 'Leonardo Vitalino',
            'cpf' => '123.456.789-69',
            'email' => 'leonardo@adm.com',
            'senha' => Hash::make('senha123'), // Use Hash::make para criptografar a senha
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
