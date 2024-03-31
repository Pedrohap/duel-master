@extends('layouts.base')
@section('title', 'Duel Master - Criar Deck')


@section('content')
<form method="post" action="{{ route('user.deck.store') }}" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">

    <h1>Adicionar Deck</h1>

    <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="deckname" placeholder="Nome do Deck" required="required" autofocus>
        <label for="floatingEmail">Nome do Deck:</label>
        @if ($errors->has('deckname'))
        <span class="text-danger text-left">{{ $errors->first('deckname') }}</span>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="cards">Cards:</label>
        <div class = "form-text">
            Siga o padrao de cartas do YgoPro, o qual o deck devera ter o codigo da carta separado por uma quebra de linha.
            Na duvida, use o <a href="https://ygoprodeck.com/deckbuilder/" >deck builder do YgoPro</a> e cole o conteudo do arquivo aqui:
        </div>
        <textarea class="form-control" name="cards" 
        placeholder=
        "#main 
22916281
22916281
#extra 
92519087
!side 
15693423
" required="required" autofocus rows="8"></textarea>
        
        @if ($errors->has('cards'))
        <span class="text-danger text-left">{{ $errors->first('cards') }}</span>
        @endif
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

    @include('auth.partials.copy')
</form>
@endsection