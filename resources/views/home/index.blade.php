@extends('layouts.base')
@section('title','Duel Master')
@section('content')

<h2 class="title">Duel Master</h2>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/banners/banner1.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h2 class='title'>Sobre</h2>
<p>Duel Master é um site/aplicação web criada para um melhor engajamento e gerenciamento de partidas do TCG (Tranding Card Game) de Yu-Gi-Oh!</p>

@endsection