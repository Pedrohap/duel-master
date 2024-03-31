@extends('layouts.base')
@section('title','Duel Master - Partidas em Andamento')
@section('content')

<h2 class="title">Partidas em andamento</h2>

@foreach ($casual_matches as $match)
@foreach ($profiles as $profile)
@if ($profile->user_id === $match->challenger)
<div class="card mb-3 me-5 ms-2" style="max-width: 500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/avatars/{{ $profile->avatar }}" class="img-fluid rounded-start card-avatar" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route ('player.show',['id'=>$profile->user_id])}}">{{$profile->nickname}}</a></h5>
                    <small class="text-muted">{{$profile->city}} - {{$profile->state}} - {{$profile->country}}</small><br>
                    <strong>Pontuação: </strong>{{$profile->rankpoints}}<br>
                    <strong>Resultado: </strong>
                    <a class="btn btn-primary btn-sm" href="{{ route('user.casualMatches.finishMatch',['id'=>$match->id,'conclusion'=>'win']) }}" role="button">Vitoria</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('user.casualMatches.finishMatch',['id'=>$match->id,'conclusion'=>'loss']) }}" role="button">Derrota</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('user.casualMatches.finishMatch',['id'=>$match->id,'conclusion'=>'drawn']) }}" role="button">Empate</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endforeach

@endforeach
@endsection

