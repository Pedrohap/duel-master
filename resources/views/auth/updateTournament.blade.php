@extends('layouts.base')
@section('title','Duel Master - Editar Torneio')
@section('content')

<h2 class="title">Editar Torneio</h2>

<form method="post" action="{{ route('user.tournaments.update',['id'=>$tournament->id]) }}" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{{ csrf_token() }}" />
@method('put')

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="name" value="{{$tournament->name}}" placeholder="Nome do Torneio" required="required" autofocus>
    <label for="name">Nome do Torneio</label>
    @if ($errors->has('name'))
    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="date" class="form-control" name="date" value="{{$tournament->date}}" placeholder="Data" required="required" autofocus>
    <label for="floatingName">Data</label>
    @if ($errors->has('date'))
    <span class="text-danger text-left">{{ $errors->first('date') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="time" class="form-control" name="time" value="{{$tournament->time}}" placeholder="Hora" required="required" autofocus>
    <label for="floatingName">Hora</label>
    @if ($errors->has('time'))
    <span class="text-danger text-left">{{ $errors->first('time') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="country" value="{{$tournament->country}}" placeholder="Pais" required="required" autofocus>
    <label for="floatingName">Pais</label>
    @if ($errors->has('country'))
    <span class="text-danger text-left">{{ $errors->first('country') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="state" value="{{$tournament->state}}" placeholder="Estado" required="required" autofocus>
    <label for="floatingName">Estado</label>
    @if ($errors->has('state'))
    <span class="text-danger text-left">{{ $errors->first('state') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="city" value="{{$tournament->city}}" placeholder="Cidade" required="required" autofocus>
    <label for="floatingName">Cidade</label>
    @if ($errors->has('city'))
    <span class="text-danger text-left">{{ $errors->first('city') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="address" value="{{$tournament->address}}" placeholder="Endereço" required="required" autofocus>
    <label for="floatingName">Endereço</label>
    @if ($errors->has('address'))
    <span class="text-danger text-left">{{ $errors->first('address') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <select class="form-select" name="status">
            <option value="open" {{ ( "open" == $tournament->status) ? 'selected' : '' }}>Aberto</option>
            <option value="closed" {{ ( "closed" == $tournament->status) ? 'selected' : '' }}>Fechado</option>
            <option value="finished" {{ ( "finished" == $tournament->status) ? 'selected' : '' }}>Encerrado</option>
            <option value="canceled" {{ ( "canceled" == $tournament->status) ? 'selected' : '' }}>Cancelado</option>
    </select>
    <label for="floatingName">Situação</label>
</div>
<h2 class="title">Classificacao</h2>
<p><small>Adicione as colocações apénas depois de encerrar o torneio</small></p>
<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="firstplace" value="{{$tournament->firstplace}}" placeholder="1º Colocado" autofocus>
    <label for="floatingName">1º Colocado</label>
    @if ($errors->has('firstplace'))
    <span class="text-danger text-left">{{ $errors->first('firstplace') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="secondplace" value="{{$tournament->secondplace}}" placeholder="2º Colocado" autofocus>
    <label for="floatingName">2º Colocado</label>
    @if ($errors->has('secondplace'))
    <span class="text-danger text-left">{{ $errors->first('secondplace') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="thirdplace" value="{{$tournament->thirdplace}}" placeholder="2º Colocado" autofocus>
    <label for="floatingName">3º Colocado</label>
    @if ($errors->has('thirdplace'))
    <span class="text-danger text-left">{{ $errors->first('thirdplace') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input name="photo" id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" value="{{$tournament->name}}" autocomplete="photo">
    <label for="floatingName">Foto do Torneio:</label>
    @if ($errors->has('photo'))
    <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
    @endif
</div>

<button class="w-100 btn btn-lg btn-dm-primary2" type="submit">Salvar Alteracoes</button>
</form>
@endsection
