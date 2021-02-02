@extends('layout.app')

@section('title', __('website.title.work') . ' - InselBunker - Techno Indie')

@section('navigation')
    @parent
@endsection


@section('main-content')
<main class="main-content" data-barba-namespace="work" data-barba="container">
    <div class="container">
      <h1 class="main-title">My Work</h1>
      <div class="row justify-content-center mt-5">
        <div class="col-11 col-xl-6 col-md-8 col-sm-10">
          <nav class="nav nav-pills nav-justified">
            <a href="#tracks" data-toggle="tab" class="nav-item nav-link active" role="tab" aria-controls="tracks" aria-selected="true">My Tracks</a>
            <a href="#sets" data-toggle="tab" class="nav-item nav-link" role="tab" aria-controls="sets" aria-selected="false">My Sets</a>
          </nav>
        </div>
      </div>
      <div class="tab-content" id="works">
        <div class="tab-pane fade show active" id="tracks" role="tabpanel" aria-labelledby="tracks-tab">
          <div class="row tracks-row mt-1">
            @foreach ($tracks as $track)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
              <div class="card track-card" data-trackid="{{ $track['id']}}" data-genre="{{ $track['genre']}}" data-title="{{ $track['title']}}">
                <img
                  class="card-img"
                  src="{{ $track['artwork_url'] ?? '/assets/images/card.jpg'}}"
                  alt="Card image"
                />
                <div class="card-img-overlay">
                  <div class="title-content">
                    <h5 title="{{ $track['title'] }}" class="card-title">{{ $track['title'] }}</h5>
                  <p class="card-text"><small>{{ $track['duration']}}</small> <br> {{ $track['created_at'] }}</p>
                  </div>
                  <div class="icon-content">
                    <img
                      src="/assets/icons/play-icon-bold.svg"
                      height="47"
                      width="47"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="tab-pane fade" id="sets" role="tabpanel" aria-labelledby="sets-tab">
          <div class="row tracks-row mt-1">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
              <div class="card track-card">
                <img
                  class="card-img"
                  src="/assets/images/card.jpg"
                  alt="Card image"
                />
                <div class="card-img-overlay">
                  <div class="title-content">
                    <h5 class="card-title">Moght</h5>
                    <p class="card-text">47:49</p>
                    <p class="card-text">Added 4 days ago</p>
                  </div>
                  <div class="icon-content">
                    <img
                      src="/assets/icons/play-icon-bold.svg"
                      height="47"
                      width="47"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
              <div class="card track-card">
                <img
                  class="card-img"
                  src="/assets/images/card.jpg"
                  alt="Card image"
                />
                <div class="card-img-overlay">
                  <div class="title-content">
                    <h5 class="card-title">Moonlight</h5>
                    <p class="card-text">Last updated 3 mins ago</p>
                  </div>
                  <div class="icon-content">
                    <img
                      src="/assets/icons/play-icon-bold.svg"
                      height="47"
                      width="47"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('work-script')
  <script src="/assets/js/work.js"></script>
@show