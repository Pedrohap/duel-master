@extends('layouts.base')
@section('title','Duel Master - Novo Torneio')
@section('content')

<h2 class="title">Criar Torneio</h2>
<form method="post" action="{{ route('user.tournaments.store') }}" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome do Torneio" required="required" autofocus>
    <label for="name">Nome do Torneio</label>
    @if ($errors->has('name'))
    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="date" class="form-control" name="date" value="{{ old('date') }}" placeholder="Data" required="required" autofocus>
    <label for="floatingName">Data</label>
    @if ($errors->has('date'))
    <span class="text-danger text-left">{{ $errors->first('date') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="time" class="form-control" name="time" value="{{ old('time') }}" placeholder="Hora" required="required" autofocus>
    <label for="floatingName">Hora</label>
    @if ($errors->has('time'))
    <span class="text-danger text-left">{{ $errors->first('time') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="Pais" required="required" autofocus>
    <label for="floatingName">Pais</label>
    @if ($errors->has('country'))
    <span class="text-danger text-left">{{ $errors->first('country') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="state" value="{{ old('state') }}" placeholder="Estado" required="required" autofocus>
    <label for="floatingName">Estado</label>
    @if ($errors->has('state'))
    <span class="text-danger text-left">{{ $errors->first('state') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Cidade" required="required" autofocus>
    <label for="floatingName">Cidade</label>
    @if ($errors->has('city'))
    <span class="text-danger text-left">{{ $errors->first('city') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Endereço" required="required" autofocus>
    <label for="floatingName">Endereço</label>
    @if ($errors->has('address'))
    <span class="text-danger text-left">{{ $errors->first('address') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input name="photo" id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" required autocomplete="photo">
    <label for="floatingName">Foto do Torneio:</label>
    @if ($errors->has('photo'))
    <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
    @endif
</div>

<button class="w-100 btn btn-lg btn-dm-primary2" type="submit">Criar Torneio</button>

</form>
@endsection
