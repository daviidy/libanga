@extends('layouts.menu')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 p-md-5">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
    <div class="card mb-3 mx-auto" style="max-width: 540px;">
      <div class="row no-gutters align-items-center">
        <div class="col-md-4 text-center">
          <i class="bi bi-shield-lock" style="font-size: 150px"></i>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">Confirm Password</h5>
            <p class="card-text">SVP confirmer le mot de passe avant de continuer.</p>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('Confirmer Mot de passe') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
