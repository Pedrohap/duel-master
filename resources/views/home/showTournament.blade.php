@extends('layouts.base')
@section('title','Duel Master - Torneio')
@section('content')

<h2 class="title">Torneio</h2>
<div class="row">
  <div class="col-md-9 me-auto">
    <h1>{{$tournament->name}}</h1>
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
      <h3>Data: {{$tournament->date}} | Hora: {{$tournament->time}}</h3>
      <strong>Local: </strong>{{$tournament->city}} - {{$tournament->state}} - {{$tournament->country}}
      <br>
      <p><strong>Endereço: </strong>{{$tournament->address}}</p>
  </div>

  <div class="col-md-auto align-self-end">
    <img src="/photos/{{ $tournament->photo }}" class="img-fluid profile-avatar float-end">
    <br>
    @auth
    @if ($tournament->organizer === auth()->user()->id)
    <form class="row justify-content-center" action="{{ route('user.tournaments.delete',['id'=>$tournament->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este Torneio?')">
      @csrf
      @method('DELETE')
      <div class="col-auto">
        <a class="btn btn-dm-primary2 btn-sm" href="{{ route('user.tournaments.edit',['id'=>$tournament->id]) }}" role="button">Editar</a>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
      </div>
    </form>
    @endif
    @endauth
  </div>
</div>

<div class="row">
  <h1>Paticipantes</h1>
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
              @if ($tournament->organizer === auth()->user()->id || $profile->user_id === auth()->user()->id)
              <a class="btn btn-danger btn-sm" href="{{route ('user.tournaments.removeApplyPlayer',['tournament_id'=>$tournament->id,'player_id'=>$profile->user_id])}}" role="button">Remover Inscirção</a>
              @endif
              @endauth
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>


@endsection