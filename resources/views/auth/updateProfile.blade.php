@extends('layouts.base')
@section('title', 'Duel Master - Atualizar Perfil')


@section('content')
<form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
    @method('put')

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">

    <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="nickname" value="{{ $profile->nickname }}" placeholder="Apelido" autofocus>
        <label for="floatingEmail">Apelido</label>
        @if ($errors->has('nickname'))
        <span class="text-danger text-left">{{ $errors->first('nickname') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3">
        <textarea class="form-control" name="bio" placeholder="Biografia" maxlength="280" autofocus rows="3">{{ $profile->bio }}</textarea>
        <label for="floatingName">Bio:</label>
        @if ($errors->has('bio'))
        <span class="text-danger text-left">{{ $errors->first('bio') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="country" value="{{ $profile->country }}" placeholder="País" autofocus>
        <label for="floatingName">País</label>
        @if ($errors->has('country'))
        <span class="text-danger text-left">{{ $errors->first('country') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="city" value="{{ $profile->city }}" placeholder="Cidade" autofocus>
        <label for="floatingName">Cidade</label>
        @if ($errors->has('city'))
        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="state" value="{{ $profile->state }}" placeholder="Estado" autofocus>
        <label for="floatingName">Estado</label>
        @if ($errors->has('state'))
        <span class="text-danger text-left">{{ $errors->first('state') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3">
        <input name="avatar" id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" value="{{ $profile->avatar }}"  autocomplete="avatar">
        <label for="floatingName">Foto de Perfil:</label>
        @if ($errors->has('avatar'))
        <span class="text-danger text-left">{{ $errors->first('avatar') }}</span>
        @endif
    </div>

    


    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

    @include('auth.partials.copy')
</form>
@endsection