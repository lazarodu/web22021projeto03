<?php

namespace App\Http\Controllers;

use App\Models\Adotante;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $animals = Animal::all();
    return view("adm/animal", compact('animals'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $adotantes = Adotante::all();
    return view("adm/animal/create", compact('adotantes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'nome' => 'required|max:255',
      'nascimento' => 'required|max:255',
      'imagem' => 'image',
      // 'adotante_id' => 'integer|exists:App\Models\Adotante,id'
    ]);
    if ($validated) {
      $animal = new Animal();
      $animal->nome = $request->get('nome');
      $animal->nascimento = $request->get('nascimento');
      // if ($request->get('imagem')) {
      // echo "imagem";
      $path = $request->file('imagem')->store('', 's3');
      Storage::disk('s3')->setVisibility($path, 'public');
      $url = Storage::disk('s3')->url($path);
      $animal->imagem = $url;
      // }
      if ($request->get('adotante_id')) {
        $animal->adotante_id = $request->get('adotante_id');
      }
      $animal->save();
      return redirect("animal");
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Animal  $animal
   * @return \Illuminate\Http\Response
   */
  public function show(Animal $animal)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Animal  $animal
   * @return \Illuminate\Http\Response
   */
  public function edit(Animal $animal)
  {
    $adotantes = Adotante::all();
    return view("adm/animal/edit", compact('adotantes', 'animal'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Animal  $animal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Animal $animal)
  {
    $validated = $request->validate([
      'nome' => 'required|max:255',
      'nascimento' => 'required|max:255',
    ]);
    if ($validated) {
      $animal->nome = $request->get('nome');
      $animal->nascimento = $request->get('nascimento');
      if ($request->get('adotante_id')) {
        $animal->adotante_id = $request->get('adotante_id');
      } else {
        $animal->adotante_id = NULL;
      }
      $animal->save();
      return redirect("animal");
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Animal  $animal
   * @return \Illuminate\Http\Response
   */
  public function destroy(Animal $animal)
  {
    $animal->delete();
    return redirect("animal");
  }
}
