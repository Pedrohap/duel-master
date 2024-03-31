<nav class="navbar navbar-expand-lg dm-primary">
    <div class="container">
        <div class="container-fluid">


            <div class="navbar" id="">
                <a class="navbar-brand" href="{{ route ('home.index') }}"><img src="{!! url('assets/logos/logo.svg') !!}" height="50px"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                @auth
                <a class="nav-link" href="{{route ('user.profile.show') }}">{{auth()->user()->name}} | <img src="/avatars/{{auth()->user()->id}}.jpg" onerror="this.src='../avatars/default.png'" class="user-avatar"></a>
                <div class="ms-3">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Sair</a>
                </div>
                @endauth

                @guest
                <div>
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.perform') }}" class="btn btn-dm-primary">Cadastre-se</a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
</nav>

<nav class="navbar navbar-expand-lg dm-secondary" data-bs-theme="dark">
    <div class="container">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Partidas
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="nav-link" href="{{route ('user.casualMatches.new') }}">Criar Partida</a>
                            </li>

                            <li class="dropdown-item">
                                <a class="nav-link" href="{{route ('user.casualMatches.request') }}">Convites de Partida</a>
                            </li>

                            <li class="dropdown-item">
                                <a class="nav-link" href="{{route ('user.casualMatches.ongoingMatches') }}">Partidas em Andamento</a>
                            </li>
                        </ul>
                    </li>


                    @endauth

                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('player.filter') }}">Jogadores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('tournaments.index') }}">Torneios</a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('user.tournaments.new') }}">Criar Torneio</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>