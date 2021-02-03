@extends('layouts.menu')

@section('content')
<div class="container">
  <div class="row py-5">

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
              <h5 class="card-title font-weight-bold">Réinitialiser le mot de passe</h5>
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email required autocomplete="email" autofocus">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password-confirm">Confirmer mot de passe</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>

              <button type="submit" class="btn btn-primary">Réinitialiser mot de passe</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>
@endsection
