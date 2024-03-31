@extends('layouts.base')
@section('title','Duel Master - Recuperar Senha')
@section('content')
<h2 class="title">Recuperar Senha</h2>
<p>Para a recuperação de senha, digite o Email cadastrado e a nova senha:</p>
<p><strong>OBS: </strong>Para evitarmos abuso desta janela, não há confirmação de troca, se seus dados estiverem corretos a sua nova senha estará ativa</p>
    <form method="post" action="{{ route('login.changePassword') }}">
        @method('put')
        @csrf
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required" autofocus>
            <label for="floatingName">Nova Senha</label>
        </div>

        <button class="w-100 btn btn-lg btn-dm-primary2" type="submit">Trocar Senha</button>
    </form>
@endsection