<?php

namespace App\Http\Controllers\Initial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
  public function index()
  {
    $carousel = [
      "imagens" =>
      [
        [
          "nome" => "Nori",
          "url" => "img/carousel/nori.svg"
        ], [
          "nome" => "Tempurá",
          "url" => "img/carousel/tempura.svg"
        ]
      ]
    ];
    return view("initial/inicio", $carousel);
  }
}
