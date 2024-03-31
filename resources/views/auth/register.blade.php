@extends('layouts.base')
@section('title','Duel Master - Cadastre-se')

@section('content')

<form method="post" action="{{ route('register.perform') }}">
    <div class="container mt-3 text-center">
        <img class="img-fluid" src="{!! url('assets/logos/logo-h-bp.png') !!}" alt="" height="30px">
    </div>
    <h2 class="h3 mb-3 fw-normal title">Registrar</h2>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome" required="required" autofocus>
                    <label for="floatingName">Nome</label>
                    @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                    <label for="floatingEmail">Email Endereço</label>
                    @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                    <label for="floatingName">Nome de Usuário</label>
                    @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                    <label for="floatingPassword">Senha</label>
                    @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                    <label for="floatingConfirmPassword">Confirmar Senha</label>
                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required="required" autofocus>
                    <label for="floatingName">Data de Nascimento</label>
                    @if ($errors->has('birthday'))
                    <span class="text-danger text-left">{{ $errors->first('birthday') }}</span>
                    @endif
                </div>

                <div class="col-md-3">
                    <button class="w-100 btn btn-lg btn-dm-primary2" type="submit">Registrar</button>
                </div>
            </div>
        </div>
    </div>


</form>
@endsection