@extends('layouts.menu')

@section('content')
<div class="container py-md-2">
  <div class="row py-5">
    <div class="col-md-12 p-md-5">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
    <div class="card mb-3 mx-auto" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4 text-center">
          <i class="bi bi-envelope" style="font-size: 120px"></i>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">Réinitialiser le mot de passe</h5>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group ">
                    <label for="email">{{ __('Adresse email') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Envoyer le lien de réinitialisation') }}
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

</div>
</div>
@endsection

