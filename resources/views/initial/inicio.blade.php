<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adopted</title>
  <link rel="stylesheet" href="{{asset('css/initial/inicio.css')}}" />
  <link rel="stylesheet" href="{{asset('css/initial/carousel.css')}}" />
</head>

<body>
  <header>
    <section>
      <picture>
        <img src="{{asset('img/logo/logo.svg')}}" alt="Logo" />
      </picture>
      <h1>Adopted</h1>
    </section>
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth
      <a href="{{ url('/adotante') }}" class="text-sm text-gray-700 underline">Área Administrativa</a>
      @else
      <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrar</a>
      @endif
      @endauth
    </div>
    @endif
  </header>
  <main>
    @inject('initial', 'App\Services\InitialService')
    <section class="carousel">
      <ol>
        @foreach($initial->carrousel() as $imagem)
        <li>
          <img src="{{asset($imagem['url'])}}" alt="{{$imagem['nome']}}" />
        </li>
        @endforeach
      </ol>
    </section>
    <h1>
      Adotantes
    </h1>
    <aside>
      @foreach($initial->adotantes() as $adotantes)
      <div><img src="{{$adotantes->user->profile_photo_url}}"> {{$adotantes->user->name}}</div>
      @endforeach
    </aside>
  </main>
</body>

</html>
