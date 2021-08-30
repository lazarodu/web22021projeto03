<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adopted</title>
  <link rel="stylesheet" href="{{ asset('css/adm/adm.css') }}">
</head>

<body>
  <header>
    <section>
      <picture>
        <img src="{{asset('img/logo/logo.svg')}}" alt="Logo" />
      </picture>
    </section>
  </header>
  <nav>
    <ul>
      <li>
        <a href="{{url('/adotante')}}">Adotantes</a>
      </li>
      <li>
        <a href="{{url('/animal')}}">Animais</a>
      </li>
      <li>
        <a href="">Avisos</a>
      </li>
    </ul>
  </nav>
  <main>
    @yield('content')
  </main>
</body>

</html>
