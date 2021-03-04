@extends('layouts.emails')
@section('content')
<section>
  <div class="p-md-5">
    <div class="card w-76 mx-auto">
      <div class="card-body">
        <div class="image-logo text-center p-3">
          <img src="https://libanga.rikudo.ci/assets/images/logo_libanga.png" width="150" alt="logo" class="img-fluid">
        </div>
        <div class="p-3">
          <h5 class="card-title">Bonjour {{ $user_name }}</h5>
          <p class="card-text">Merci de vous être inscrit! S'il vous plaît, Confirmer votre email en cliquant sur le lien ci-dessous.</p>
        </div>
        <div class="text-center p-3">
          <button style="bacground-color:green;">
            <a href="{{ $url }}" class="btn font-weight-bold rounded-pill bg-btn">Confirmez votre mail</a>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
