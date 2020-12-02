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
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
    </header>

    @yield('content')


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
