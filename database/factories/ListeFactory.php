<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Liste;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Liste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
        'frequence' => $this->faker->word,
        'indication' => $this->faker->word,
        'emplacement' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
