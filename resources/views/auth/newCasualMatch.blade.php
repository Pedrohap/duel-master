@extends('layouts.base')
@section('title', 'Duel Master - Criar Partida Casual')


@section('content')
<h2 class="title">Criar Partida</h2>
<form method="post" action="{{ route('user.casualMatches.store') }}">
    @csrf

<div class="mb-3">
    <label for="challengee" class="form-label">Oponente:</label>
    <select class="form-select" id="challengee" name="challengee">
      @foreach ($profiles as $profile)
        @if ($profile->user_id != auth()->user()->id)
        <option value="{{$profile->user_id}}">{{$profile->nickname}}</option>
        @endif
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-dm-primary2 btn-sm">Desafiar</button>
</form>
@endsection('content')