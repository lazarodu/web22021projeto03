<?php

namespace App\Http\Livewire;

use App\Models\Aviso;
use Livewire\Component;
use Livewire\WithPagination;

class Avisos extends Component
{
  use WithPagination;

  public $content = "";
  public $editId = 0;

  protected $rules = [
    'content' => 'required|min:5|max:255'
  ];

  public function render()
  {
    $avisos = Aviso::paginate(10);
    return view('livewire.avisos', compact('avisos'))
      ->layout('adm.avisos');
  }

  public function store()
  {
    $this->validate();

    if ($this->editId == 0) {
      $aviso = new Aviso();
    } else {
      $aviso = Aviso::findOrFail($this->editId);
    }
    $aviso->content = $this->content;
    $aviso->save();

    $this->content = '';
    $this->editId = 0;
  }

  public function edit(Aviso $aviso)
  {
    $this->content = $aviso->content;
    $this->editId = $aviso->id;
  }

  public function limpar()
  {
    $this->content = '';
    $this->editId = 0;
  }

  public function destroy(Aviso $aviso)
  {
    $aviso->delete();
  }
}
