@extends('adm.layout')

@section('content')
<a href="{{url('adotante/create')}}" class="button">Adicionar</a>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Documento</th>
      <th>Endereço</th>
      <th>Número</th>
      <th>Complemento</th>
      <th>Bairro</th>
      <th>Estado</th>
      <th>Cidade</th>
      <th>Editar</th>
      <th>Remover</th>
    </tr>
  </thead>
  <tbody>
    @foreach($adotantes as $adotante)
    <tr>
      <td>{{$adotante->user->name}}</td>
      <td>{{$adotante->documento}}</td>
      <td>{{$adotante->endereco}}</td>
      <td>{{$adotante->numero}}</td>
      <td>{{$adotante->complemento}}</td>
      <td>{{$adotante->bairro}}</td>
      <td>{{$adotante->estado}}</td>
      <td>{{$adotante->cidade}}</td>
      <td>
        <a href="{{route('adotante.edit',$adotante->id)}}" class="button">
          Editar
        </a>
      </td>
      <td>
        <form method="POST" action="{{route('adotante.destroy',$adotante->id)}}" onsubmit="return confirm('tem certeza?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="button">
            Remover
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
