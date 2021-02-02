@extends('layout.app')

@section('title', __('website.title.contact') . ' - InselBunker - Techno Indie')

@section('navigation')
    @parent
@endsection


@section('main-content')
<main
class="main-content"
data-barba-namespace="contact"
data-barba="container"
>
<div class="container">
  <h1 class="main-title">@lang('website.title.contact')</h1>
  <section class="contact">
    <div class="row mt-5 justify-content-between align-items-center">
      <div class="col-sm-6">
      <h3>Wants a Collab? {{ $post_success ?? ''}}</h3>
        <p>
          Fill the form bellow and lets have a coffee togehter. I cant
          wait to work with you
        </p>
      </div>
      <div class="col-md-6">
        <img
          src="/assets/images/contact.jpg"
          class="img-fluid"
          alt="Fynn Eicke"
        />
      </div>
    </div>

    <div class="row justify-content-center mt-5">
      @if ($errors->has('agreement') && $errors->count() === 1)
          <div class="alert alert-danger">
            @error('agreement')
                {{ $message }}
            @enderror
          </div>
      @endif
      <div class="col-lg-8">
        <form action="{{ url(app()->getLocale() . '/contact')}}" method="POST">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control @error('fullname') is-invalid @enderror"
                  aria-describedby="fullname"
                  name="fullname"
                  placeholder="{{ __('website.forms.labels.fullname') }}"
                  value="{{ old('fullname') }}"
                />
                @error('fullname')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  aria-describedby="emailHelp"
                  name="email"
                  placeholder="{{ __('website.forms.labels.email') }}"
                  value="{{ old('email') }}"
                />
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                <small id="emailHelp" class="form-text text-muted"
                  >@lang('website.forms.helps.email')
                </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <textarea
                  placeholder="{{ __('website.forms.labels.contact_message') }}"
                  class="form-control @error('message') is-invalid @enderror"
                  name="message"
                  rows="5"
              >{{ old('message')}}</textarea>
                @error('message')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                <small id="emailHelp" class="form-text text-muted"
                  >@lang('website.forms.helps.message')
                </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-check @error('agreement') is-invalid @enderror">
                <input
                  name="agreement"
                  class="form-check-input"
                  id="agreement"
                  type="checkbox"
                  value="agreement"
                />
                <label class="custom-control-label" for="agreement">
                  @lang('website.forms.labels.contact_agreement')
                </label>
              </div>
            </div>
          </div>
          @csrf
          <div class="row justify-content-center mt-3">
              <div class="col-12 col-sm-6 col-md-6">
                  <button type="submit" class="btn btn-light btn-block">@lang('website.forms.labels.contact_submit_btn') !</button>
              </div>
          </div>
        </form>
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