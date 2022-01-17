<?php

namespace App\Services;

use App\Models\Adotante;

class InitialService
{
  public function carrousel()
  {
    $imagens = [
      [
        "nome" => "Nori",
        "url" => "img/carousel/nori.svg"
      ], [
        "nome" => "Tempurá",
        "url" => "img/carousel/tempura.svg"
      ]
    ];
    return $imagens;
  }

  public function adotantes()
  {
    $adotantes = Adotante::all();
    return $adotantes;
  }
}
