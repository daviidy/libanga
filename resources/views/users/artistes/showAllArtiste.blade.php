
@extends('layouts.menu')
@section('content')
      <section class="bg-allArtiste d-flex flex-column justify-content-center position-relative">
        <div class="container">
          <div class="row justify-content-md-center align-items-center">
            <div class="col-md-12">
              <div class="">
                <div class="">
                  <h1 class="text-center text-white font-weight-bold">Trouver nos artistes</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="py-md-5 pt-3 d-md-flex justify-content-between align-items-center">
              <!--h2 class="h1 text-white font-weight-bold text-uppercase">Nos artistes</h2-->
              <div class="search">
                <input class="form-control" id="courseSearch" type="text" placeholder="Filtrer par artiste">
              </div>
            </div>
          </div>
        </div>

        <div class="row py-4 mb-md-5" id="contentArtist">

        @isset($artistes)
        @foreach ($artistes as $artiste)
        <div class="col-md-4 mt-3 text-md-left text-center filter">
          <a  @if (auth()->check())
                  href="{{route('show.artiste',$artiste->id)}}"
              @else
                  href="#" data-toggle="modal" data-target="#modalLogin"
              @endif class="text-decoration-none" >
            <div class="bg-white rounded-lg p-3 hover-bloc">
              <div class="d-md-flex p-2">
                <img src="{{asset($artiste->image)}}" alt="" width="150" height="150" class="img-fluid rounded-lg">
                <div class="d-flex flex-column p-3">
                  <span class="p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    {{$artiste->username}}
                  </span>
                  <span class="p-1">
                    Artiste chanteure
                  </span>
                  <span class="p-1">
                    Côte d'ivoire
                  </span>

                </div>
              </div>
              <div class="p-2">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehende</p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      @endisset
        </div>

      </section>

    </div>

    @endsection
