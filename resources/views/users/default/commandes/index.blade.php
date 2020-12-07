@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">
    <div class="row">
      <!--progression-->
      @include('includes\menuLeftDashboard\menuDefautLeft')
      <!--end progression-->
      <!--main content-->
      <div class="col-md-9 main-content">
        <!--div class="row">
          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item">
              <h3>Active Order</h3>
              <form>
                <div class="form-group mb-0">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div-->
        <div class="row">
          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item rounded">
              <div class="">
                <h5 class="font-weight-bold">Active Order</h5>
                <p class="font-weight-lighter mt-2">Updated 29 nov</p>
              </div>
              <p class="rounded-lg mr-4 p-2 border btn">
                <span class="mr-2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/></svg></span>
                Star
              </p>
            </div>
          </div>
        </div>

        <div class="row p-3">
          <div class="px-3">
            <div class="row bg-white">
              <div class="col-md-9">
                <div class="p-4">
                  <h4 class="font-weight-bold py-3">Lorem ipsum dolor sit amet</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
                </div>
              </div>
              <div class="col-md-3">
                  <img src="/assets/images/slide.png" alt="" class="img-fluid w-50">
              </div>
            </div>
          </div>
        </div>

        <div class="row bg-white mx-1 mt-3">
          <div class="col-md-12 p-2">
            <h4 class="text-center font-weight-bolder p-2">Lorem ipsum dolor sit amet, consectetur adipisicing</h4>
          </div>
        </div>
      </div>
      <!--end main content-->
      <div id="overlay"></div>
    </div>
  </main>
  @include('includes.usersPopup.popupEditDefault')

@endsection
