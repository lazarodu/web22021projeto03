@extends('adm.layout')

@section('content')
@if(count($errors) > 0)
<ul class="validator">
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{url('animal',$animal->id)}}">
  @csrf
  @method('PUT')
  <div class="row">
    <label class="col-2" for="nome">Nome</label>
    <input type="test" name="nome" id="nome" class="col-5" value="{{ $animal->nome }}" />
    <label class="col-2" for="nasc">Nascimento</label>
    <input type="date" name="nascimento" id="nasc" class="col-3" value="{{ $animal->nascimento }}" />
  </div>
  <div class="row">
    <label class="col-2" for="adotante">Adotante</label>
    <select class="col-5" name="adotante_id" id="adotante">
      <option></option>
      @foreach($adotantes as $adotante)
      <option value="{{$adotante->id}}" @if($adotante->id==$animal->adotante_id) selected @endif>{{$adotante->user->name}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="button">Salvar</button>
</form>

@endsection
