@extends('layout.app')

@section('title', __('website.title.about') . ' - InselBunker - Techno Indie')

@section('navigation')
    @parent
@endsection


@section('main-content')
<main
class="main-content"
data-barba-namespace="about"
data-barba="container"
>
<div class="container">
  <h1 class="main-title">Hey I'm Fynn</h1>
  <section class="about-me mt-5">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-7 col-lg-6 align-middle">
        <h3>And I love techno</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
          enim ad minim veniam, quis nostrud.
        </p>
      </div>
      <div class="col-md-5">
        <img
          src="/assets/images/me.jpg"
          class="img-fluid"
          alt="Fynn Eicke"
        />
      </div>
    </div>

    <div class="row justify-content-around align-items-center mt-5">
      <div class="col-md-6 mt-5">
        <img
          src="/assets/images/music.jpg"
          class="img-fluid"
          alt="My Music"
        />
      </div>
      <div class="col-md-6 col-lg-4 align-middle mt-3">
        <h3>My music</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut
        </p>
      </div>
    </div>

    <div class="row justify-content-center mt-5">
      <div class="col-12 col-sm-10 d-flex justify-content-center mt-5">
        <img
          src="/assets/images/inspiration.jpg"
          class="img-fluid mx-auto"
          alt="Inspiration"
        />
      </div>
      <div class="col-12 text-center mt-5">
        <h3>My Inspiration</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
          enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
          in reprehenderit in voluptate velit esse cillum dolore eu fugiat
          nulla pariatur. Excepteur sint occaecat cupidatat non proident,
          sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>

    <div class="follow row justify-content-around align-items-center">
      <div class="col-4 text-center">
          <h6 class="m-0">Follow me</h6>
      </div>
      <div class="col-md-5 col-8">
          <div class="btn-row">
              <a class="btn btn-icon" href="">
                  <img src="/assets/icons/facebook-icon.svg" height="44" width="44" alt="">
              </a>
              <a class="btn btn-icon" href="">
                  <img src="/assets/icons/facebook-icon.svg" height="44" width="44" alt="">
              </a>
              <a class="btn btn-icon" href="">
                  <img src="/assets/icons/facebook-icon.svg" height="44" width="44" alt="">
              </a>
          </div>
      </div>
    </div>
  </section>
</div>
</main>
@endsection