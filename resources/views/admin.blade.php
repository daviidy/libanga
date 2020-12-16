<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body class="main-content1">
    <header>
      <nav class="navbar navbar-expand-sm bg-white border-bottom fixed-top">
        <ul class="navbar-nav flex-row align-items-center">
          <li class="nav-item">
            <a href="#" class="text-decoration-none">
              <i class="fas fa-bars hamburger"></i>
            </a>
          </li>
          <li class="nav-item ml-3">
            <a href="/" class="text-decoration-none">
              <img class="logo-short img-fluid" src="./assets/images/logo-os-noir.png" alt="Logo">
              <img class="logo" src="./assets/images/logo-oschool-noir.png" alt="">
              Libanga
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              <img class="rounded-circle img-fluid user-avatar" src="https://secure.gravatar.com/avatar/9c275cba24f7c939201cda28f832f8e0?s=80" alt="User">
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Déconnexion') }}
               </a>
            </div>
          </li>
        </ul>
      </nav>
    </header>

    <main class="container-fluid">
      <div class="row">
        <!--progression-->
        <div class="col-3 d-none side-menu d-md-block bg-menu mt-5 pt-5">
          <div class="mb-md-4 mb-2">
            <div>
            <div class="accordion" id="accordionExample">
              <div class="card border-0 rounded-0">
                <div class="card-header bg-menu" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left bg-menu" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <div class="bg-menu">
                        <span><i class="fas fa-house-user"></i></span>
                        Tableau de bords
                      </div>
                      <span><span><i class="fas fa-angle-right"></i></span></span>
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body list-group pcard-boxm rounded-0">
                    <a href="#" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Accueil</a>
                  </div>
                </div>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-header bg-menu" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="bg-menu btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <div class="">
                        <span><i class="far fa-gem"></i></span>
                        Utilisateurs
                      </div>
                      <span><i class="fas fa-angle-right"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body list-group pcard-boxm rounded-0">
                    <a href="#" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Liste des utilisateurs</a>
                  </div>
                </div>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-header bg-menu" id="headingThree">
                  <h2 class="mb-0">
                    <button class="bg-menu btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left collapsed bg-heard" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <div class="">
                        <span><i class="fas fa-certificate"></i></span>
                        Catégories
                      </div>
                      <span><i class="fas fa-angle-right"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body list-group pcard-boxm rounded-0">
                    <a href="#" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Liste des catégories</a>
                    <a href="#" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Ajouter une categorie</a>
                  </div>
                </div>
              </div>
              <div class="card border-0 rounded-0">
                <div class="card-header bg-menu" id="headingFour">
                  <h2 class="mb-0">
                    <button class="bg-menu btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                      <div class="">
                        <span><i class="fas fa-money-bill-wave"></i></span>
                        Offres de prix
                      </div>
                      <span><i class="fas fa-angle-right"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body list-group pcard-boxm rounded-0">
                    <a href="#" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Liste des offres </a>
                    <a href="#" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Ajouter une offre</a>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!--end progression-->
        <!--main content-->
        <div class="col-md-9 main-content p-3">
          <div class="row">
            <div class="col-md-12 py-4 pr-b">
              <p class="h4"><span class="bg-primary p-2 shadow rounded-lg"><i class="fas fa-users text-white"></i></span>La liste des utilisateurs </p>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="table-responsive-md">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                      <th scope="col">Rôle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>OttoOttoOttoOttoOttoOtto</td>
                      <td><button type="button" class="btn btn-primary"><i class="far fa-edit"></i></button></td>
                      <td>
                        <form class="" action="index.html" method="post">
                          <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
        <!--end main content-->
        <div id="overlay"></div>
      </div>
    </main>


    <!--footer class="container-fluid bg-main border-top-footer">
      <div class="p-md-4 p-3 text-white">
          © <span id="year">2010 </span> LIBANGA. TOUS DROITS RÉSERVÉS.
      </div>
    </footer-->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    /*COPYRIGTH SCRIPT*/
    var date = new Date();
    var annee = date.getFullYear();
    document.getElementById('year').innerHTML = annee;
    </script>
    <script>
      $('.hamburger').click(function() {
        if ($(window).width() < 600) {
          $('.side-menu').toggleClass('col-3');
          $('.side-menu').toggleClass('d-none');
          $('.side-menu').toggleClass('col-8');
          $('.side-menu').toggleClass('d-block');
          $('.main-content').toggleClass('d-none');
          $('#overlay').fadeToggle(300);
        } else {
          $('.side-menu').toggleClass('d-md-block');
          $('.main-content').toggleClass('col-md-9');
          $('.main-content').toggleClass('col-md-12');
          $('main').toggleClass('container-fluid');
          $('main').toggleClass('container');
        }
      });
    </script>
    <script>
      $(document).ready(function() {
        $("#viewAnswer").click(function() {
          $(this).addClass("d-none");
          $("#verifyAnswer").removeClass("d-none")
        });

        $("#restartQuiz").click(function() {
          $("#verifyAnswer").addClass("d-none");
          $("#viewAnswer").removeClass("d-none")
        });
      });
    </script>
  </body>
</html>
