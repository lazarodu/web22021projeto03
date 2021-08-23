@extends('adm.layout')

@section('content')
@if(count($errors) > 0)
<ul class="validator">
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{url('adotante',$adotante->id)}}">
  @csrf
  @method('PUT')


  <div class="row">
    <label class="col-2" for="user">Usuário</label>
    <select class="col-5" name="user_id" id="user">
      <option></option>
      @foreach($users as $user)
      <option value="{{$user->id}}" @if($user->id==$adotante->user_id) selected @endif>{{$user->name}}</option>
      @endforeach
    </select>
    <label class="col-2" for="doc">Documento</label>
    <input type="text" name="documento" id="doc" class="col-3" value="{{ $adotante->documento }}" />
  </div>
  <div class="row">
    <label class="col-2" for="ender">Endereço</label>
    <input type="test" name="endereco" id="ender" class="col-5" value="{{ $adotante->endereco }}" />
    <label class="col-2" for="num">Número</label>
    <input type="text" name="numero" id="num" class="col-3" value="{{ $adotante->numero }}" />
  </div>
  <div class="row">
    <label class="col-2" for="comp">Complemento</label>
    <input type="text" name="complemento" id="comp" class="col-5" value="{{ $adotante->complemento }}" />
    <label class="col-2" for="bairro">Bairro</label>
    <input type="text" name="bairro" id="bairro" class="col-3" value="{{ $adotante->bairro }}" />
  </div>
  <div class="row">
    <label class="col-2" for="est">Estado</label>
    <input type="text" name="estado" id="est" class="col-4" value="{{ $adotante->estado }}" />
    <label class="col-2" for="cidade">Cidade</label>
    <input type="text" name="cidade" id="cidade" class="col-4" value="{{ $adotante->cidade }}" />
  </div>
  <button type="submit" class="button">Salvar</button>
</form>

@endsection
