@extends('layouts.base')
@section('title','Duel Master - Perfil de Jogador')
@section('content')

<h2 class="title">Perfil de {{$profile->nickname}}</h2>
<div class="row">
    <div class="col-md-9 me-auto">
        <h1>{{$profile->nickname}}</h1>
        <h3>{{$user->name}}</h3>
        <p><strong>Local:</strong> {{ $profile->city }} - {{ $profile->state }} - {{ $profile->country }}</p>
        <p><strong>Sobre: </strong>{{ $profile->bio }}</p>
    </div>

    <div class="col-md-auto align-self-end">
        <img src="/avatars/{{ $profile->avatar }}" class="img-fluid profile-avatar float-end">
        <span>
            <p class="title">PoNToS: {{ $profile->rankpoints }}</p>
        </span>
    </div>
</div>

<div class="row">
    <h1>Decks</h1>
    <div class="container text-center">
        <div class="row">
            @foreach ($decks as $deck)
            <div class="col-auto">
                <strong><a href="{{ route('deck.show',['id'=>$deck->id]) }}"><img src="/assets/icons/deck.svg" height="60px"> <br>{{ $deck->deckname }}</a></strong>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <h1>Partidas</h1>
    @foreach ($casual_matches as $match)
    @foreach ($profiles as $profile)
    @if ($profile->user_id === $match->challenger && $profile->user_id !=$ownerId)
    <div class="card mb-3 me-5" style="max-width: 500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/avatars/{{ $profile->avatar }}" class="img-fluid rounded-start card-avatar" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route ('player.show',['id'=>$profile->user_id])}}">{{$profile->nickname}}</a></h5>
                    <small class="text-muted">{{$profile->city}} - {{$profile->state}} - {{$profile->country}}</small><br>
                    <strong>Pontuação: </strong>{{$profile->rankpoints}}<br>
                    <strong>Resultado:</strong>
                    @if ($match->winner === $ownerId)
                    <span class="badge text-bg-success">Vitória</span>
                    @elseif ($match->is_drawn === 1)
                    <span class="badge text-bg-warning">Empate</span>
                    @elseif ($match->winner === $profile->user_id)
                    <span class="badge text-bg-danger">Derrota</span>
                    @elseif ($match->winner === null && $match->is_drawn === null)
                    <span class="badge text-bg-secondary">Aguardando Resultado</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @elseif ($profile->user_id === $match->challengee && $profile->user_id !=$ownerId)
    <div class="card mb-3 me-5" style="max-width: 500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/avatars/{{ $profile->avatar }}" class="img-fluid rounded-start card-avatar" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route ('player.show',['id'=>$profile->user_id])}}">{{$profile->nickname}}</a></h5>
                    <small class="text-muted">{{$profile->city}} - {{$profile->state}} - {{$profile->country}}</small><br>
                    <strong>Pontuação: </strong>{{$profile->rankpoints}}<br>
                    <strong>Resultado:</strong>
                    @if ($match->winner === $ownerId)
                    <span class="badge text-bg-success">Vitória</span>
                    @elseif ($match->is_drawn === 1)
                    <span class="badge text-bg-warning">Empate</span>
                    @elseif ($match->winner === $profile->user_id)
                    <span class="badge text-bg-danger">Derrota</span>
                    @elseif ($match->winner === null && $match->is_drawn === null)
                    <span class="badge text-bg-secondary">Aguardando Resultado</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endforeach



</div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection