@extends('layout.app')

@section('title', __('website.title.home') . ' - InselBunker - Techno Indie')

@section('navigation')
    @parent
@endsection


@section('main-content')
<main class="main-content" data-barba-namespace="home" data-barba="container">
  <section class="home-header">
    <div class="overlay"></div>
    <div class="home-header-content">
      <h1 class="big-title">Inselbunker</h1>
    </div>
  </section>
</main>
@endsection