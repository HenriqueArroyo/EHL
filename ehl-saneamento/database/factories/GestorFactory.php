<?php

namespace Database\Factories;

use App\Models\Gestor;
use Illuminate\Database\Eloquent\Factories\Factory;

class GestorFactory extends Factory
{
    protected $model = Gestor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
