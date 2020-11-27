@extends('layouts.menuShowArtiste')
@section('content')

  <section class="mt-5 pt-5 col">
    <div class="conntainer-fluid p-md-4">
      <div class="row">
        <div class="col-md-4">
          <div class="card w-100 p-3 card-shadow">
            <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" class="card-img-top rounded-circle img-fluid text-center m-auto avatar-card" alt="...">
            <h5 class="h4 card-title text-center pt-2 font-weight-bold">Arafat Dj</h5>
            <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            <a href="#" class="btn btn-primary mt-3">Me contatez</a>
            <hr>
            <div class="card-body">
              <ul class="list-group">
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-map-marker-alt"></i> Pays</span>
                  Cote d'ivoire
                </li>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-microphone-alt"></i> Artiste depuis</span>
                  juin 2010
                </li>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-record-vinyl"></i> Albums</span>
                  3
                </li>
              </ul>
            </div>
          </div>

          <div class="card w-100 p-3 mt-3 card-shadow">
            <div class="card-body">
              <h5 class="card-title font-weight-bold h5 text-uppercase">Titre à succès</h5>
              <p class="card-text"> <span class="h6 font-weight-bold">Kpangor :</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
          </div>

          <div class="card w-100 p-3 mt-3 card-shadow">
            <div class="card-body">
              <h5 class="card-title font-weight-bold h5 text-uppercase">Description</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>

        </div>
        <div class="col-md-8">
          <div class="mt-3 mt-md-0">
            <div class="bg-white p-md-4 p-3 mb-3 card-shadow">
              <h3 class="h3 font-weight-bold">Mes servives</h3>
            </div>
            <div class="">
              <div class="card-deck">
                <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                  <a href="#" class="text-decoration-none">
                    <div class="wprock-img-zoom">
                      <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font-weight-bold">Prestation</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                      <i class="fas fa-heart"></i>
                      <small class="text-muted">15000 Fcfa</small>
                    </div>
                  </a>
                </div>
                <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                  <a href="#" class="text-decoration-none">
                    <div class="wprock-img-zoom">
                      <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font-weight-bold">Prestation</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                      <i class="fas fa-heart"></i>
                      <small class="text-muted">15000 Fcfa</small>
                    </div>
                  </a>
                </div>
                <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                  <a href="#" class="text-decoration-none">
                    <div class="wprock-img-zoom">
                      <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font-weight-bold">Prestation</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                      <i class="fas fa-heart"></i>
                      <small class="text-muted">15000 Fcfa</small>
                    </div>
                  </a>
                </div>
              </div>
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
