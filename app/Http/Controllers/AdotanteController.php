<?php

namespace App\Http\Controllers;

use App\Models\Adotante;
use App\Models\User;
use Illuminate\Http\Request;

class AdotanteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $adotantes = Adotante::all();
    return view("adm/adotante", compact('adotantes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::all();
    return view("adm/adotante/create", compact('users'));
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
      'user_id' => 'required|integer',
      'documento' => 'required|max:255',
      'endereco' => 'required|max:255',
      'numero' => 'required|max:255',
      'complemento' => 'required|max:255',
      'bairro' => 'required|max:255',
      'estado' => 'required|max:255',
      'cidade' => 'required|max:255',
    ]);
    if ($validated) {
      $adotante = new Adotante();
      $adotante->user_id = $request->get('user_id');
      $adotante->documento = $request->get('documento');
      $adotante->endereco = $request->get('endereco');
      $adotante->numero = $request->get('numero');
      $adotante->complemento = $request->get('complemento');
      $adotante->bairro = $request->get('bairro');
      $adotante->estado = $request->get('estado');
      $adotante->cidade = $request->get('cidade');
      $adotante->save();
      return redirect("adotante");
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Adotante  $adotante
   * @return \Illuminate\Http\Response
   */
  public function show(Adotante $adotante)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Adotante  $adotante
   * @return \Illuminate\Http\Response
   */
  public function edit(Adotante $adotante)
  {
    $users = User::all();
    return view("adm/adotante/edit", compact('users', 'adotante'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Adotante  $adotante
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Adotante $adotante)
  {
    $validated = $request->validate([
      'user_id' => 'required|integer',
      'documento' => 'required|max:255',
      'endereco' => 'required|max:255',
      'numero' => 'required|max:255',
      'complemento' => 'required|max:255',
      'bairro' => 'required|max:255',
      'estado' => 'required|max:255',
      'cidade' => 'required|max:255',
    ]);
    if ($validated) {
      $adotante->user_id = $request->get('user_id');
      $adotante->documento = $request->get('documento');
      $adotante->endereco = $request->get('endereco');
      $adotante->numero = $request->get('numero');
      $adotante->complemento = $request->get('complemento');
      $adotante->bairro = $request->get('bairro');
      $adotante->estado = $request->get('estado');
      $adotante->cidade = $request->get('cidade');
      $adotante->save();
      return redirect("adotante");
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Adotante  $adotante
   * @return \Illuminate\Http\Response
   */
  public function destroy(Adotante $adotante)
  {
    $adotante->delete();
    return redirect("adotante");
  }
}
