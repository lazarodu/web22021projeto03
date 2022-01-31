<?php

namespace Database\Factories;

use App\Models\Aviso;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvisoFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Aviso::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'content' => $this->faker->paragraph()
    ];
  }
}
