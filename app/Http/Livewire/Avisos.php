<?php

namespace App\Http\Livewire;

use App\Models\Aviso;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class Avisos extends Component
{
  use WithPagination;

  public $content = "";
  public $editId = 0;
  public $title = "";
  public $expoToken = "ExponentPushToken[EoOgqUBXRxl---b-H0tBcu]";

  protected $rules = [
    'title' => 'required|min:5|max:255',
    'content' => 'required|min:5|max:255',
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
    // $aviso->save();
    dd($this->content);
    $response = Http::post('https://exp.host/--/api/v2/push/send', [
      'to' => $this->expoToken,
      'sound' => 'default',
      'title' => $this->title,
      'body' => $this->content,
      'data' => ["data" => "Que bom que vocês vieram!!!"],
    ]);

    $this->content = '';
    $this->editId = 0;

    // dd($response);
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
