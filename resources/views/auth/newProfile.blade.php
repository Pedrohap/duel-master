@extends('layouts.base')
@section('title','Duel Master - Cadastre-se')

@section('content')
<form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
    <div class="container mt-3 text-center">
        <img class="img-fluid" src="{!! url('assets/logos/logo-h-bp.png') !!}" alt="" height="30px">
    </div>
    <h2 class="h3 mb-3 fw-normal title">Criar Perfil</h2>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" placeholder="Apelido" required="required" autofocus>
                    <label for="floatingEmail">Apelido</label>
                    @if ($errors->has('nickname'))
                    <span class="text-danger text-left">{{ $errors->first('nickname') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <textarea class="form-control" name="bio" value="{{ old('bio') }}" placeholder="Biografia" required="required" maxlength="280" autofocus rows="3"></textarea>
                    <label for="floatingName">Bio</label>
                    @if ($errors->has('bio'))
                    <span class="text-danger text-left">{{ $errors->first('bio') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="País" required="required" autofocus>
                    <label for="floatingName">País</label>
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
                    <input name="avatar" id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" value="{{ old('avatar') }}" autocomplete="avatar">
                    <label for="floatingName">Foto de Perfil</label>
                    @if ($errors->has('avatar'))
                    <span class="text-danger text-left">{{ $errors->first('avatar') }}</span>
                    @endif
                </div>

                <div class="col-md-5">
                    <button class="w-100 btn btn-lg btn-dm-primary2" type="submit">Cadastrar Perfil</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection