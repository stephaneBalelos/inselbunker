<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tags -->
    <title>@yield('title')</title>
    <meta name="title" content="@yield('title')">
    <meta name="description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Meta Tags — Preview, Edit and Generate">
    <meta property="og:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="Meta Tags — Preview, Edit and Generate">
    <meta property="twitter:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">


    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/assets/css/styles.css" />
</head>
<body data-barba="wrapper">

    @section('navigation')
    <div class="navigation-container">
        <div class="navbar-icon">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
  
        <nav class="navigation">
          <ul class="navigation-links">
            <li class="nav-link">
            <a href="{{ url(app()->getLocale() . '/')}}">@lang('website.menu.home')</a>
            </li>
  
            <li class="nav-link">
            <a href="{{ url(app()->getLocale() . '/work')}}">@lang('website.menu.work')</a>
            </li>
  
            <li class="nav-link">
              <a href="{{ url(app()->getLocale() . '/aboutme')}}">@lang('website.menu.about')</a>
            </li>
  
            <li class="nav-link">
              <a href="{{ url(app()->getLocale() . '/contact')}}">@lang('website.menu.contact')</a>
            </li>
          </ul>

                  
          <div class="bottom">
            <div class="social-links">
              <button class="btn social-btn">
                <img src="/assets/icons/facebook-icon.svg" height="44" width="44" alt="">
              </button>
              <button class="btn social-btn">
                <img src="/assets/icons/twitter-icon.svg" height="44" width="44" alt="">
              </button>
              <button class="btn social-btn">
                <img src="/assets/icons/instagram-icon.svg" height="44" width="44" alt="">
              </button>
            </div>
            <div class="app-links">
              @if (app()->getLocale() === 'de')
                <a class="prevent" href="{{ str_replace('de', 'en', url()->current() )}}">English version</a>
              @endif

              @if (app()->getLocale() === 'en')
                <a class="prevent" href="{{ str_replace('en', 'de', url()->current() )}}">Deutsche version</a>
              @endif
              <a href="#">Impressum</a>
            </div>
          </div>
        </nav>
      </div>
      <div class="sidebar">
        <div class="logo">
          <img src="/assets/images/logo.svg" alt="Insel Bunker" />
        </div>
        <div class="social-links">
          <button class="btn social-btn">
            <img src="/assets/icons/spotify-icon.svg" height="44" width="44" alt="">
          </button>
          <button class="btn social-btn">
            <img src="/assets/icons/facebook-icon.svg" height="44" width="44" alt="">
          </button>
          <button class="btn social-btn">
            <img src="/assets/icons/twitter-icon.svg" height="44" width="44" alt="">
          </button>
          <button class="btn social-btn">
            <img src="/assets/icons/instagram-icon.svg" height="44" width="44" alt="">
          </button>
        </div>
      </div>
    @show

    @yield('main-content')


    @section('audio-player')
    <div class="audio-player">
        <div class="player-loader loading">
          <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
          </div>
        </div>
        <div class="audio-display">
          <span> Now Playing... </span>
          <p class="song-title">Wonderland of my way i love you</p>
          <p class="audio-feat">feat Dj Magic System</p>
        </div>
        <div class="audio-controls">
          <a class="audio-btn prev">
            <img
              height="48"
              width="48"
              src="{{ url('/assets/icons/backward-icon.svg') }}"
              alt=""
            />
          </a>
          <a class="audio-btn play">
            <img
              height="48"
              width="48"
              src="{{ url('/assets/icons/play-icon-circle.svg') }}"
              alt=""
            />
          </a>
          <a class="audio-btn next">
            <img
              height="48"
              width="48"
              src="{{ url('/assets/icons/forward-icon.svg') }}"
              alt=""
            />
          </a>
        </div>
      </div>
    @show


    @section('transition-elements')
    <div style="background-color: #333333" class="transition-wrapper"></div>
    <div class="transition-wrapper">
      <h1>Insel Bunker</h1>
    </div>
    @show

    @section('first-loader')
    <div class="initial-loader">
      <div>
        <h4>
          Sound on
        </h4>
        <svg class="volume-icon" width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4714 17.1419C12.3999 17.7277 12.3789 18.3042 12.219 18.9005C11.9644 19.7505 11.2986 20.2704 10.5802 20.2494C10.2394 20.2578 9.75977 20.0503 9.43685 19.7788L5.6702 16.7195H3.57178C2.5599 16.7195 1.87831 16.0299 1.74052 14.8938C1.54382 13.4956 1.56276 10.9698 1.74052 9.54336C1.87831 8.55817 2.5599 7.78156 3.57178 7.78156H5.6702L9.35901 4.77464C9.68193 4.5011 10.2394 4.24327 10.5802 4.25061C11.2986 4.22965 11.9644 4.75054 12.219 5.59948C12.361 6.14237 12.3999 6.77331 12.4714 7.35918C12.6429 8.72901 12.6429 15.772 12.4714 17.1419Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path class="sound-effect" opacity="0.4" d="M16.4434 7.06055C17.3514 8.36655 17.8964 10.1185 17.8964 12.0685C17.8964 14.0185 17.3514 15.7695 16.4434 17.0755" stroke="#200E32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path class="sound-effect" opacity="0.4" d="M19.8745 4C21.3375 6.104 22.2155 8.926 22.2155 12.068C22.2155 15.21 21.3375 18.033 19.8745 20.137" stroke="#200E32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h1>
        Welcome in the bunker
      </h1>
    </div>
    @show

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@barba/core@2.9.7/dist/barba.umd.min.js"></script>
    <script src="/assets/js/index.js"></script>
    <script src="/assets/js/animations.js"></script>
    <script src="https://connect.soundcloud.com/sdk/sdk-3.3.2.js"></script>
    <script src="/assets/js/sound-cloud-sdk.js"></script>
</body>
</html>