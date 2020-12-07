@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">
    <div class="row">
      <!--progression-->
      <div class="col-3 d-none side-menu d-md-block bg-main">
        <div class="bg-white mt-5 p-3 mb-4">
          <div>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                <img class="rounded-circle img-fluid user-avatar" src="https://secure.gravatar.com/avatar/9c275cba24f7c939201cda28f832f8e0?s=80" alt="User">
                <span>{{auth()->user()->username}}</span>
                <span>N/A</span>
              </li>
            </ul>
          </div>

          <hr>

          <div>
            <div>
              <ul class="list-group">
                <li><a href="#" class="list-group-item d-flex justify-content-between align-items-center border-0">Cras justo odio</a></li>
                <li><a href="#" class="list-group-item d-flex justify-content-between align-items-center border-0">Cras justo odio</a></li>
                <li><a href="#" class="list-group-item d-flex justify-content-between align-items-center border-0">Cras justo odio</a></li>
              </ul>
            </div>
          </div>

          <hr>
          <div class="">
            <div class="">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                  Cras justo odio
                  <span class="">0$</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                  Dapibus
                  <span >N/A</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!--div class="mb-md-4 mb-2">
          <div >
            <ul class="list-group">
              <li class="py-md-4 list-group-item d-flex justify-content-between align-items-center border-0">
                <span>Inbox</span>
                <a href="#">View all</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="mb-md-4 mb-2">
          <div>
            <div class="">
              <ul class="list-group">
                <li class="py-md-4 font-weight-bold list-group-item justify-content-between align-items-center border-0">
                  <span class="text-center">Liez vos réseaux sociaux</span>
                </li>
                <li class="py-md-4 list-group-item d-flex justify-content-between align-items-center border-0">
                  <span class="rounded-circle user-avatar p-3 bg-primary"><i class="fab fa-facebook-f text-white"></i></span>
                  <span class="rounded-circle user-avatar p-3 bg-primary"><i class="fab fa-twitter"></i></span>
                  <span class="rounded-circle user-avatar p-3 bg-primary"><i class="fab fa-twitter"></i></span>
                </li>
              </ul>
            </div>
          </div>
        </div-->
      </div>
      <!--end progression-->
      <!--main content-->
      <div class="col-md-9 main-content">
        <div class="row">
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
        </div>
        <div class="row">
          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item rounded">
              <div class="">
                <h5 class="font-weight-bold">Active Order</h5>
                <p class="font-weight-lighter mt-2">Updated 29 nov</p>
              </div>
              <p class="rounded-lg mr-4 p-2 border">
                <span class="mr-2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/></svg></span>
                Star
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex mt-4 text-white">
              <p class="font-weight-bold w-25">Lorem ipsum</p>
              <hr class="border-white w-100 my-auto">
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
        <div class="row bg-white p-2 mx-1">
          <div class="col-md-12">
            <div class="card-deck">
              <div class="card border-0">
                <i class="fas fa-bullhorn px-4"></i>
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">Get notices</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer border-0 bg-white">
                  <button type="button" class="btn btn-outline-success">Get notices</button>
                </div>
              </div>
              <div class="card border-0">
                <i class="fas fa-book-open px-4"></i>
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">Get notices</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer border-0 bg-white">
                  <button type="button" class="btn btn-outline-success">Get notices</button>
                </div>
              </div>
              <div class="card border-0">
                <i class="far fa-star px-4"></i>
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">Get notices</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer border-0 bg-white">
                  <button type="button" class="btn btn-outline-success">Get notices</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3 p-2">
          <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" style="height: 250px;">
                <div class="carousel-item active">
                  <img src="https://images.unsplash.com/photo-1573164574230-db1d5e960238?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" class="d-block w-100 img-fluid" alt="...">
                  <div class="carousel-caption d-none d-md-block bg-dark">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://oschoolelearning.com/images/divers/corporate-1.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--end main content-->
      <div id="overlay"></div>
    </div>
  </main>

@endsection
