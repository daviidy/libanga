@extends('layouts.menu')

@section('content')
<style media="screen">
  .bg-hero,
  footer{
    display: none;
  }
</style>
<div>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="bg-transparent rounded-lg">
        <div style="border-radius: 7px 7px 0 0; background:#e7cbc2">
          <div class="position-relative text-center p-3" style="bottom:30px">
            <div class="mx-auto">
              <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" alt="" class="img-fluid rounded-circle avatar-login-img">
            </div>
            <div class="">
              <p class="w-75 mx-auto mb-0 text-center h4 pt-3">Inscrivez-vous</p>
            </div>
          </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="p-md-4 p-2 bg-white">
              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-user"></i></span>
                </div>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus Placeholder="Username">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="far fa-envelope"></i></span>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                </div>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Client</option>
                  <option>Artiste</option>
                </select>
              </div>

              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-lock"></i></span>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="input-group input-group-lg mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-lock"></i></span>
                </div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer le mot de passe">
              </div>

              <p class="text-center">Avez-vous un compte? <a href="/login">Connectez-vous</a> </p>
            </div>

          <button type="submit" class="btn btn-lg btn-block p-md-4 p-3 text-center text-white mb-0 text-uppercase" style="border-radius: 0 0 7px 7px; background:#6f23ff">
                {{ __("S'inscrire") }} <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg></span>
              </button>
                {{-- --}}

          </form>
      </div>
    </div>
  </div>
</div>

<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
