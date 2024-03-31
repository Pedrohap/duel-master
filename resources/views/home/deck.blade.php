@extends('layouts.base')
@section('title','Duel Master - Perfil')
@section('content')

<h2 class="title">Deck: {{$deck->deckname}}</h2>
<p>Criado por: <strong>{{$nickname}}</strong></p>

<h2 class="title">Cards:</h2>

<div class="container text-left">
    @foreach ($cards as $card)
        @if ($card === '#main' && $card != '#extra' && $card != "!side")
            <h3>Main Deck:</h3>
        @endif

        @if ($card != '#main' && $card === '#extra' && $card != "!side")
            <h3>Extra Deck:</h3>
        @endif

        @if ($card != '#main' && $card != '#extra' && $card === "!side")
            <h3>Side Deck:</h3>
        @endif

        @if ($card != '#main' && $card != '#extra' && $card != "!side" && $card != "")
            <a href="https://ygoprodeck.com/card/?search={{$card}}"><img src="https://images.ygoprodeck.com/images/cards_small/{{$card}}.jpg" height="150px" class="mb-1"></a>

        @endif
        
    @endforeach
</div>

@endsection