@extends('adm.layout')

@section('content')
@if(count($errors) > 0)
<ul class="validator">
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{url('animal')}}">
  @csrf
  @method('POST')
  <div class="row">
    <label class="col-2" for="nome">Nome</label>
    <input type="test" name="nome" id="nome" class="col-5" value="{{ old('nome') }}" />
    <label class="col-2" for="nasc">Nascimento</label>
    <input type="date" name="nascimento" id="nasc" class="col-3" value="{{ old('nascimento') }}" />
  </div>
  <div class="row">
    <label class="col-2" for="adot">Adotante</label>
    <select class="col-5" name="adotante_id" id="adot">
      <option></option>
      @foreach($adotantes as $adotante)
      <option value="{{$adotante->id}}" @if($adotante->id==old('adotante_id')) selected @endif>{{$adotante->user->name}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="button">Salvar</button>
</form>

@endsection
