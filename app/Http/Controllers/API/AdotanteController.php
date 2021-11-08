<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Adotante;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AdotanteController extends Controller
{
  use ApiResponse;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $adotantes = Adotante::all();
    return $this->success($adotantes);
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
      'user_id' => 'required|integer|exists:App\Models\User,id',
      'documento' => 'required|max:255|unique:adotantes',
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
      return $this->success($adotante);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
