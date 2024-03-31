@extends('layouts.base')
@section('title','Duel Master - Jogadores')
@section('content')

<h2 class="title">Buscar Jogadores</h2>

<h2>Filtrar por:</h2>

<form class="row g-3 mb-3" method="post" action="{{route ('player.search')}}">
  @csrf
  <div class="col-md-4">
    <label for="city" class="form-label">Cidade:</label>
    <select class="form-select" id="city" name="city">
      <option value=""></option>
      @foreach ($cities as $city)
      <option value="{{$city->city}}">{{$city->city}}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-3">
    <label for="state" class="form-label">Estado:</label>
    <select class="form-select" id="state" name="state">
      <option value=""></option>
      @foreach ($states as $state)
      <option value="{{$state->state}}">{{$state->state}}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-4">
    <label for="country" class="form-label">País:</label>
    <select class="form-select" id="country" name="country">
      <option value=""></option>
      @foreach ($countries as $country)
      <option value="{{$country->country}}">{{$country->country}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-1 align-self-end">
    <button type="submit" class="btn btn-dm-primary2 ">Buscar</button>
  </div>
</form>

<h2>Resultados:</h2>

<div class="container">
  <div class="row justify-content-center">
    @foreach ($profiles as $profile)
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
            @auth
            @if ($profile->user_id != auth()->user()->id)
            <form method="post" action="{{ route('user.casualMatches.store') }}" onsubmit="return confirm('Tem certeza que deseja desafiar {{$profile->nickname}}?')">
            @csrf
            <input type="text" id="challengee" name="challengee" value="{{$profile->user_id}}" hidden>
            <button type="submit" class="btn btn-dm-primary2 btn-sm">Desafiar</button>

            </form>
            @endif
            @endauth
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>

@endsection