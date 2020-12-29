<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!--link rel="icon" href="#"-->
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> -->
  <script src="https://kit.fontawesome.com/d86848cfe0.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/assets/css/showArtiste.css">

</head>

<body class="bg-main">

  <header>

    <nav class="navbar navbar-expand-sm bg-white border-bottom fixed-top">
      <div class="navbar-brand" href="#">
            <a href="/">
              <img class="img-fluid" src="/assets/images/logo_libanga.png" alt="" width="100" height="100">
            </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mx-md-auto align-items-md-center">
          <li class="nav-item px-md-4 active">
            <a class="nav-link font-weight-bold" href="/">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item px-md-4 active">
            <a class="nav-link font-weight-bold" href="/nosartistes">Nos artistes</a>
          </li>
          <li class="nav-item px-md-4 active">
            <a class="nav-link font-weight-bold" href="/quisommesnous">A propos</a>
          </li>
          <li class="nav-item px-md-4 active">
            <a class="nav-link font-weight-bold" href="/contacternous">Contactez-nous</a>
          </li>
        </ul>
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="navbardr" data-toggle="dropdown">
              <img class="rounded-circle img-fluid user-avatar" src="{{(auth()->user()->image) ? asset(auth()->user()->image) : asset("/assets/images/users/avatar_default.png")}}" alt="User">
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/">Accueil</a>
              <a class="dropdown-item" href="{{ route('dashboard')}}">Tableau de bord</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Déconnexion') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </div>

      </div>
    </nav>
  </header>


  @yield('content')



  <footer class="container-fluid bg-main border-top-footer">
    <div class="p-md-4 p-3 text-white">
        © <span id="year">2010 </span> LIBANGA. TOUS DROITS RÉSERVÉS.
    </div>
  </footer>

  <script>
    /*COPYRIGTH SCRIPT*/
    var date = new Date();
    var annee = date.getFullYear();
    document.getElementById('year').innerHTML = annee;
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.3.1/highlight.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
  <!--COPYRIGTH SCRIPT-->
  <script>
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
