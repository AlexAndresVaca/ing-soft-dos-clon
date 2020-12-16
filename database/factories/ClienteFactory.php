<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'ci_cli' => '17'.$this->faker->randomNumber($nbDigits = 8, $strict = true),
            'apellido_cli' => $this->faker->lastName(),
            'nombre_cli' => $this->faker->firstName(),
            'celular_cli' => $this->faker->optional()->numberBetween($min = 900000000, $max = 999999999),
            'nombre_cli' => $this->faker->firstName(),
            'tipo_cli' => $this->faker->randomElement($array = array ('Diario','Mensual')),
            'sexo_cli' => $this->faker->randomElement($array = array ('Hombre','Mujer')),

        ];
    }
}
