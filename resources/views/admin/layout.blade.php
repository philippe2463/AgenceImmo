<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <style>
    @layer reset {
        button {
            all: unset;
        }
    }
    </style>

</head>
<body>
    @php
        $route = request()->route()->getName();
    @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">Agence</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a @class(["nav-link", "active" => str_contains($route, 'property.')]) href="{{ route('admin.property.index') }}">Gérer les biens</a>
                </li>
                <li class="nav-item">
                    <a @class(["nav-link", "active" => str_contains($route, 'option.')]) href="{{ route('admin.option.index') }}">Gérer les options</a>
                </li
            </ul>
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
            
                    <form class="nav-item" action="{{route('logout')}}" method="POST">
                    @csrf
                    @method('delete')
                        <button class="nav-link">Se déconnecter</button>
                    </form>
                
            @endauth
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