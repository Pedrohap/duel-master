@extends('layouts.base')
@section('title','Duel Master - Torneios')
@section('content')

{{
  $entry = false;
}}

<h2 class="title">Torneios</h2>
<h1>Filtrar por:</h1>

<form class="row mb-3" method="post" action="{{route ('tournaments.filter')}}">
  @csrf
  <div class="col-md-3">
    <label for="city" class="form-label">Cidade:</label>
    <select class="form-select" id="city" name="city">
      <option value=""></option>
      @foreach ($cities as $city)
      <option value="{{$city->city}}">{{$city->city}}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-2">
    <label for="state" class="form-label">Estado:</label>
    <select class="form-select" id="state" name="state">
      <option value=""></option>
      @foreach ($states as $state)
      <option value="{{$state->state}}">{{$state->state}}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-3">
    <label for="country" class="form-label">País:</label>
    <select class="form-select" id="country" name="country">
      <option value=""></option>
      @foreach ($countries as $country)
      <option value="{{$country->country}}">{{$country->country}}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-3">
    <label for="status" class="form-label">Situação:</label>
    <select class="form-select" name="status">
            <option value=""></option>
            <option value="open">Aberto</option>
            <option value="closed" >Fechado</option>
            <option value="finished">Encerrado</option>
            <option value="canceled">Cancelado</option>
    </select>
  </div>
  <div class="col-md-1 align-self-end">
    <button type="submit" class="btn btn-dm-primary2">Filtrar</button>
  </div>

</form>

<h2>Resultados:</h2>
<div class="row justify-content-center">
@foreach ($tournaments as $tournament)
<div class="card mb-3 me-5" style="max-width: 550px; max-height: 181px">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/photos/{{ $tournament->photo }}" class="img-fluid rounded-start card-photo" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <a href="{{route ('tournaments.show',['id'=>$tournament->id])}}">
                    <h5 class="card-title">{{$tournament->name}}</h5>
                </a>
                @if ($tournament->status === 'open')
                <span class="badge text-bg-success">Aberto</span>
                @endif
                @if ($tournament->status === 'closed')
                <span class="badge text-bg-danger">Fechado</span>
                @endif
                @if ($tournament->status === 'finished')
                <span class="badge text-bg-primary">Encerrado</span>
                @endif
                @if ($tournament->status === 'canceled')
                <span class="badge text-bg-warning">Cancelado</span>
                @endif
                <br>
                <strong>Data: </strong> {{$tournament->date}} | <strong>Hora: </strong> {{$tournament->time}}
                <br>
                <strong>Local: </strong><small class="text-muted">{{$tournament->city}} - {{$tournament->state}} - {{$tournament->country}}</small>
                <br>
                <strong>Endereço: </strong><small class="text-muted">{{$tournament->address}}</small>
                <br>
                @auth
                    @if ($tournament->status === 'open')
                        @if (!empty($players[0]))
                            @foreach ($players as $player)
                                @if ($player->player === auth()->user()->id && $player->tournament === $tournament->id)
                                @php
                                  $entry=true;
                                @endphp
                                @break
                                @endif
                            @endforeach
                        @else
                        <a class="btn btn-dm-primary2 btn-sm" href="{{route ('user.tournaments.apply',['id'=>$tournament->id])}}" role="button">Participar</a>
                        @endif
                    @endif

                @if ($entry === true)
                <a class="btn btn-danger btn-sm" href="{{route ('user.tournaments.removeApply',['id'=>$tournament->id])}}" role="button">Remover Inscirção</a>
                @else
                <a class="btn btn-dm-primary2 btn-sm" href="{{route ('user.tournaments.apply',['id'=>$tournament->id])}}" role="button">Participar</a>
                @endif
                @endauth
  
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection