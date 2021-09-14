<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/monApp.css') }}">

    <title>Document</title>
</head>
<body class="bg-dark">
    <header class=" Mnavbar">
        <nav class="navbar navbar-expand-lg  ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active greenLime" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link greenLime" href="/equipe">Toutes les équipes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link greenLime" href="/joueur">Tout les joueurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link greenLime" href="/equipe/create">Créer une équipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link greenLime" href="/joueur/create">Créer un Joueur</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>