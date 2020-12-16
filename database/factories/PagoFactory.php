<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pago;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $p = []; // Array para guardar los id's de los perfiles
        $clientes = Cliente::get(['ci_cli']); // Consulta de los clientes (Si no colocamos el Seed de perfiles primero, esta linea traerá datos vacíos ya que no se han creado los perfiles)
        foreach ($clientes as $cli) {
            $p[] = $cli->ci_cli; // añadimos el valor al array
        }
        return [
            //
            'detalle_pag' => $this->faker->optional(0.5, null)->sentence($nbWords = 6, $variableNbWords = true), 
            'f_vencimiento_pag' => $this->faker->dateTimeThisYear($max = 'now', $timezone = 'America/Guayaquil'),
            'fk_ci_cli_pag' => $this->faker->randomElement($p),
        ];
    }
}
