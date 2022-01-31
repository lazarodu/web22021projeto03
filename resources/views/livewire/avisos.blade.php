<div>
  <p>{{$content}}</p>
  <form method="post" wire:submit.prevent="store">
    <div class="bg-red-400">
      @error('content') <p>{{$message}}</p> @enderror
    </div>
    <input type="hidden" name="editId" wire:model="editId" />
    <textarea name="content" wire:model="content" class="w-full rounded-lg"></textarea><br />
    <button type="submit" class="bg-colorstrong rounded-lg p-2">Enviar</button>
    <button type="button" class="bg-colorlight rounded-lg p-2" wire:click="limpar()">Limpar</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>Avisos</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
    </thead>
    <tbody>
      @foreach($avisos as $aviso)
      <tr>
        <td>{{$aviso->content}}</td>
        <td><button type="button" class="bg-blue-500 rounded-lg p-1" wire:click="edit({{$aviso->id}})">@svg('far-edit')</button></td>
        <td><button type="button" class="bg-red-500 rounded-lg p-1" wire:click="destroy({{$aviso->id}})">@svg('far-trash-alt')</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
    {{$avisos->links()}}
  </div>
</div>
