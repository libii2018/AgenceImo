<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
  <title>@yield('title') | Administration</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
      <div class="container-fluid">
        <a href="/" class="navbar-brand">Agence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggle-icon"></span>
      </button>
      @php
        $route = request()->route()->getName();
      @endphp
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route,'.property')])>Gerer les biens</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.option.index') }}" @class(['nav-link', 'active' => str_contains($route,'.option')])>Gerer les options</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  <div class="container mt-5">
    @include('shared.flash')
    @yield('content')
  </div>

  <script>
    new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
  </script>
</body>
</html>