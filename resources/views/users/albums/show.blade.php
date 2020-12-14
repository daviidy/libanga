@php
    use Carbon\Carbon;
    Carbon::setLocale('fr');
@endphp

@extends('layouts.menuShowArtiste')
@section('content')

  <section class="mt-5 pt-5 col">
    <div class="conntainer-fluid p-md-4">
      <div class="row">
        <div class="col-md-4">
          <div class="card w-100 p-3 card-shadow">
            <img src="{{asset(auth()->user()->image)}}" class="card-img-top rounded-circle img-fluid text-center m-auto avatar-card" alt="...">
            <h5 class="h4 card-title text-center pt-2 font-weight-bold"></h5>
            <p class="card-text text-center">{{auth()->user()->username}}</p>
            {{-- <a href="#" class="btn btn-primary mt-3">Me contatez</a> --}}
            <hr>
            <div class="card-body">
              <ul class="list-group">
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-record-vinyl"></i> Albums</span>
                  {{$albums->title}}
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="mt-3 mt-md-0">
            <div class="bg-white p-md-4 p-3 mb-3 card-shadow">
              <h3 class="h3 font-weight-bold">Mes chansons</h3>
            </div>
            <div class="row" id="service">
                @isset($chansons)
                @foreach ($chansons as $chanson)
                    <div class="col-md-4 mt-3">
                        <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                              <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$chanson->title}}</h5>
                              </div>

                          </div>
                    </div>
                @endforeach
            @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal ->
  <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="modalLoginLabel">Commander mes services</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div-->

  <div  class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-transparent border-0">
        <span class="float-right position-absolute rounded-circle svg-delete close" data-dismiss="modal" aria-label="Close"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg></span>
        <div class=" rounded-lg popup-shadow">
          <div class="" style="border-radius: 7px; background:#e7cbc2">
            <div class="position-relative text-center p-md-3 p-2" style="bottom:30px">
              <div class="mx-auto">
                <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" alt="" class="img-fluid rounded-circle avatar-login-img">
              </div>
                <div class="">
                  <p class="w-75 mx-auto mb-0 text-center h4 pt-3">Commander mes services</p>
                </div>
                <div class="text-left mt-md-5 my-4 text-center">
                  <a href="#" class="text-decoration-none box-hover h-auto rounded-pill py-3 px-md-5 px-4 mt-3 mb-5 text-white btn-h btn-shadow">Commander maintenant</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


