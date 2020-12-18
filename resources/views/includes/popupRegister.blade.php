
<!-- Modal-->
<div  class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
  <span class="float-right position-absolute rounded-circle svg-delete close" data-dismiss="modal" aria-label="Close"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg></span>
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

              <p class="text-center">Avez-vous un compte? <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalLogin" >Connectez-vous</a> </p>
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

{{-- @section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))

    <script>
    $(function() {

        $('#modalLogin').modal({
            show: false
        });
        $('#modalRegister').modal({
            show: true
        });
    });
    </script>
@endif
@endsection --}}
