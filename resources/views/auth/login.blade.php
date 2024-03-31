@extends('layouts.base')
@section('title','Duel Master - Login')
@section('content')
<div class="row">
    <form method="post" class="row justify-content-center" action="{{ route('login.perform') }}">
        <div class="col-md-6">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="container mt-3 text-center">
                <img class="img-fluid" src="{!! url('assets/logos/logo-h-bp.png') !!}" alt="" height="30px">
            </div>

            <h1 class="h3 mb-3 fw-normal title">Login</h1>

            @include('layouts.partials.messages')

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                <label for="floatingName">Email ou Nome de Usuário</label>
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
            <a href="{{ route('login.recoverPassword') }}">Esqueci minha senha</a>

            <div class="col-md-2 align-self-end">
                <button class="w-100 btn btn-lg btn-dm-primary2 btn-sm" type="submit">Login</button>
            </div>
        </div>
    </form>
</div>
@endsection