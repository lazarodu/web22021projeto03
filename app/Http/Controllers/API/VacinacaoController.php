<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vacinacao;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class VacinacaoController extends Controller
{
  use ApiResponse;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $vacinacao = Vacinacao::all();
    $this->success($vacinacao);
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
      'animal_id' => 'required|integer|exists:App\Models\Animal,id',
      'nome' => 'required|max:255',
      'data' => 'required|date',
    ]);
    if ($validated) {
      $vacinacao = new Vacinacao();
      $vacinacao->animal_id = $request->get('animal_id');
      $vacinacao->nome = $request->get('nome');
      $vacinacao->data = $request->get('data');
      $vacinacao->save();
      return $this->success($vacinacao);
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
    try {
      $vacinacao = Vacinacao::where('animal_id', $id)->get();
      return $this->success($vacinacao);
    } catch (\Throwable $th) {
      return $this->error("Vacinação não encontrada!!!", 401, $th->getMessage());
    }
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
    $validated = $request->validate([
      'nome' => 'required|max:255',
      'data' => 'required|date',
    ]);
    if ($validated) {
      try {
        $vacinacao = Vacinacao::findOrFail($id);
        $vacinacao->nome = $request->get('nome');
        $vacinacao->data = $request->get('data');
        $vacinacao->save();
        return $this->success($vacinacao);
      } catch (\Throwable $th) {
        return $this->error("Vacinação não encontrada!!!", 401, $th->getMessage());
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $vacinacao = Vacinacao::findOrFail($id);
      $vacinacao->delete();
      return $this->success($vacinacao);
    } catch (\Throwable $th) {
      return $this->error("Vacinação não encontrada!!!", 401, $th->getMessage());
    }
  }
}
