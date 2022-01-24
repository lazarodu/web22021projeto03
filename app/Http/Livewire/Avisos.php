<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Avisos extends Component
{
  public $content = "Conteúdo da Classe oi";

  public function render()
  {
    return view('livewire.avisos')
      ->layout('adm.avisos');
  }
}
