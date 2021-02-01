@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">
    <div class="row">
      <!--progression-->
      @include('includes\menuLeftDashboard\menuDefautLeft')
      <!--end progression-->
      <!--main content-->
      <div class="col-md-9 main-content">

        <div class="row">
          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item rounded">
              <div class="">
                <h5 class="font-weight-bold">Mes commandes</h5>
              </div>
              <p class="btn-commande rounded-lg mr-4 p-3 border btn" data-toggle="modal" data-target="#modalCommandes">
                Ajouter un service
              </p>
            </div>
          </div>
        </div>

        <div class="row mx-1 mt-3">
          <div class="col-md-3 p-2">
            <div class="">

                  <div class="p-3 box-shadow rounded ">
                      <div class="">
                      <img src="" alt="" class="img-fluid">
                      </div>
                      <div class="pt-2">
                      <h6 class="text-white font-weight-bold">arafate</h6>
                      <p class="text-white">Dédicaces</p>
                      </div>
                  </div>
          </div>
        </div>
      </div>
      <!--end main content-->
      <div id="overlay"></div>
    </div>
  </main>
  @include('includes.usersPopup.popupEditDefault')
  @include('includes.usersPopup.popupDefaultCommande')


@endsection
