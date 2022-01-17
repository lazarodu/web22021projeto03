<?php

namespace App\Http\Controllers\Initial;

use App\Http\Controllers\Controller;
use App\Models\Adotante;
use Illuminate\Http\Request;

class InicioController extends Controller
{
  public function index()
  {
    return view("initial/inicio");
  }
}
