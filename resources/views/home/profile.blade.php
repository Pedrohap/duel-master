@extends('layouts.base')
@section('title','Duel Master - Perfil')
@section('content')



<h2 class="title">Seu Perfil</h2>
<div class="row">
    <div class="col-md-9 me-auto">
        <h1>{{ $profile[0]->nickname }} <a class="btn btn-dm-primary btn-sm" href="{{ route('user.profile.edit') }}" role="button">Editar Perfil</a></h1>
        <h3>{{$user->name}}</h3>
        <p><strong>Local:</strong> {{ $profile[0]->city }} - {{ $profile[0]->state }} - {{ $profile[0]->country }}</p>
        <p><strong>Sobre: </strong>{{ $profile[0]->bio }}</p>
    </div>

    <div class="col-md-auto align-self-end">
        <img src="/avatars/{{ $profile[0]->avatar }}" class="img-fluid profile-avatar float-end">
        <span>
            <p class="title">PoNToS: {{ $profile[0]->rankpoints }}</p>
        </span>
    </div>
</div>

<div class="row">
    <h1>Decks</h1>
    <div class="container text-center">
        <div class="row">
            @foreach ($decks as $deck)
            <div class="col-auto">
                <form class="mb-1" action="{{ route('user.deck.delete',['id'=>$deck->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este Deck?')">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-dm-primary btn-sm" href="{{ route('user.deck.edit',['id'=>$deck->id]) }}" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dm-primary" data-bs-title="Editar Deck"><i class="bi bi-pencil-square"></i></a>

                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" data-bs-title="Apagar Deck">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

                <strong><a href="{{ route('deck.show',['id'=>$deck->id]) }}"><img src="/assets/icons/deck.svg" height="60px"> <br>{{ $deck->deckname }}</a></strong>
            </div>
            @endforeach
            <div class="col-auto align-self-end ms-3">

                <a href="{{ route('user.deck.new') }}" role="button"><img src="/assets/icons/newdeck.svg" height="60px"> <br><strong>Adicionar Deck</strong></a>
            </div>

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