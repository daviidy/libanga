<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
  </head>
  <body class="bg-main">
    <div class="main-content bg-main">
      <header class="bg-hero">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="/"><img src="/assets/images/libanga.jpg" alt="" class="img-fluid"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-md-auto">
              <li class="nav-item px-md-4 active">
                <a class="nav-link font-weight-bold" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item px-md-4 active">
                <a class="nav-link font-weight-bold" href="#">Features</a>
              </li>
              <li class="nav-item px-md-4 active">
                <a class="nav-link font-weight-bold" href="#">Pricing</a>
              </li>
            </ul>

            @if (auth()->check())
                <div class="dropdown">
                    <div class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://oschoolelearning.com/images/courses/logos/1580161319.png" alt="" class="rounded-circle img-fluid avatar-size">
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Tableau de bord</a>
                    <a class="dropdown-item" href="#">Another action</a>
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
            @else
                <div class="mt-md-0 mt-4">
                    <a href="#" class="text-decoration-none h-auto rounded-pill py-3 px-5 text-white btn-h-2 btn-shadow" data-toggle="modal" data-target="#modalLogin">
                    S'inscrire
                    </a>
                </div>
            @endif

          </div>
        </nav>
      </header>


      @yield('content')

@include('includes.popupLogin')

<footer class="container-fluid bg-main border-top-footer">
  <div class="p-md-4 p-3 text-white">
      © <span id="year">2010 </span> LIBANGA. TOUS DROITS RÉSERVÉS.
  </div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
<script>

    /*COPYRIGTH SCRIPT*/
    var date = new Date();
    var annee = date.getFullYear();
    document.getElementById('year').innerHTML = annee;
</script>

    @if(old('test') == "is_error")

        <script>
        $(function() {

            $('#modalRegister').modal({
                show: false
            });
            $('#modalLogin').modal({
                show: true
            });
        });
        </script>

    @elseif($errors->has('email') || $errors->has('password'))

        <script>
        $(function() {

            $('#modalLogin').modal({
                show: false
            });
            $('#modalRegister').modal({
                show: true
            });
        });
        </script>
    @endif
@yield('scripts')
</body>
</html>
