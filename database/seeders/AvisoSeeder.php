<?php

namespace Database\Seeders;

use App\Models\Aviso;
use Illuminate\Database\Seeder;

class AvisoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Aviso::factory(20)->create();
  }
}
