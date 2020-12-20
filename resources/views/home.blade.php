@php

@endphp
@extends('layouts.menu')
@section('content')
      <section class="hero position-relative">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-md-12 d-flex flex-column cta px-md-3 px-0 py-5">
              <div class=" mb-md-5 text-center">
                <p class="font-weight-bold display-4"> <span class="font-weight-lighter">Bienvenue sur  </span>Libanga</p>
                <h4>"Le Name-dropping à portée de clic"</h4>
              </div>
              <div class="text-left mt-md-5 my-4 text-center">
                @if (auth()->check())
                    <a href="{{ route('dashboard')}}" class="text-decoration-none box-hover h-auto rounded-pill py-3 px-5 mt-3 mb-5 text-white btn-h btn-shadow">Demarrer</a>
                @else
                    <a style="background-color: #2EBD50 !important;" href="#" class="text-decoration-none box-hover h-auto rounded-pill py-3 px-5 mt-3 mb-5 text-white btn-h btn-shadow" data-toggle="modal" data-target="#modalLogin">S'inscrire</a>
                @endif
              </div>
            </div>
            <!--div class="col-12 col-md-5 image">
              <div class="telephone-image"></div>
            </div-->
          </div>
        </div>
        <div class="wave d-md-block d-none">
          <img src="/assets/images/wave.png" alt="">
          <div class="spacer"></div>
        </div>
      </section>

      <section class="container-fluid mb-md-5">
        <div class="p-5">
          <h2 class="h1 text-white font-weight-bold text-center text-uppercase">Nos artistes</h2>
        </div>
        <div class="row py-4"  id="test">
            @isset($artistes)
                @foreach ($artistes as $artiste)
                    <div class="col-md-2 mt-3">

                        <a  @if (auth()->check())
                                href="{{route('artistes.show',$artiste->id)}}"
                            @else
                                href="#" data-toggle="modal" data-target="#modalLogin"
                            @endif class="text-decoration-none" >
                            <div class="p-3 box-shadow rounded ">
                                <div class="">
                                <img src="{{ ($artiste->image) ? asset($artiste->image) : asset("/assets/images/users/avatar_default.png")}}" alt="" class="img-fluid">
                                </div>
                                <div class="pt-2">
                                <h6 class="text-white font-weight-bold">{{$artiste->username}}</h6>
                                <p class="text-white">{{$artiste->username}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endisset
            {{-- <div class="col-md-2 mt-3" id="test">
            </div> --}}
        </div>
        <div class="d-flex justify-content-center">
            <form action="{{route('nosartistes')}}" method="GET" id="artiste-form">
                @csrf
                <button class="box-shadow btn bg-hero text-white rounded-lg btn-lg" type="button" onclick="getArtisteFromAjax('artiste-form')"> Voir plus</button>
            </form>

        </div>
      </section>
      <section class="container-fluid">
        <div class="row p-md-5">
          <div class="col-md-6">
            <div class="p-4 text-center">
            <img src="/assets/images/abort2.jpg" alt="abord" class="img-fluid">
            </div>
          </div>
          <div class="col-md-6">
            <div class="text-white py-md-5">
            <p class="">
              Vous avez toujours entendu des noms de personnes êtres immortalisés dans des chansons de grands artistes, vous rêvez que le vôtre aussi soit cité ? Vous êtes au bon endroit.
            </p>
            <p class="">
              Libanga est l’intermédiaire de confiance entre votre artiste préféré et vous.
              Libanga s’assure que l’artiste vous dédicace bien dans son album et garantie à l’artiste le paiement de la prestation.
            </p>
          </div>
          </div>
        </div>
        <!--div class="col-md-12">
          <div class="d-md-flex d-block">
            <img src="/assets/images/abort3.png" alt="" class="img-fluid" style="height:300px">
            <div class="p-md-5 p-2">
              <p class="text-white p-md-5">Vous avez toujours entendu des noms de personnes êtres immortalisés dans des chansons de grands artistes, vous rêvez que le vôtre aussi soit cité ? Vous êtes au bon endroit.
                Libanga est l’intermédiaire de confiance entre votre artiste préféré et vous.
                Libanga s’assure que l’artiste vous dédicace bien dans son album et garantie à l’artiste le paiement de la prestation.
              </p>
            </div>
          </div>
        </div-->
        <h3 class="m-auto text-center text-white text-uppercase">Comment ça marche ?</h3>

        <div class="row p-md-5">
          <div class="col-md-6 text-white">
            <div class="">
              <ul class="list-group">
                <li class="list-group-item bg-main border-0 d-flex align-items-center">
                  <span class="badge badge-dark rounded-circle p-3 mr-3 font-weight-ace_bold">1</span>
                  Créez un compte
                </li>
                <li class="list-group-item bg-main border-0 d-flex align-items-center">
                  <span class="badge badge-dark rounded-circle p-3 mr-3 font-weight-ace_bold">2</span>
                  Sélectionnez l’artiste
                </li>
                <li class="list-group-item bg-main border-0 d-flex align-items-center">
                  <span class="badge badge-dark rounded-circle p-3 mr-3 font-weight-ace_bold">3</span>
                  Renseignez le nom que vous souhaitez faire dédicacer
                </li>
                <li class="list-group-item bg-main border-0 d-flex align-items-center">
                  <span class="badge badge-dark rounded-circle p-3 mr-3 font-weight-ace_bold">4</span>
                  Payez
                </li>
              </ul>
              <div class="px-4 py-3">
                <p >Vous n’avez plus qu’à patienter, nous prenons la suite.
                  Votre demande est transmise à l’artiste et nous nous assurons que le nom est bien dédicacé dans la chanson.
                </p>
                <p>
                  Si le nom est dédicacé dans la chanson, Libanga verse votre paiement à l’artiste.
                  Si ce n’est pas le cas, vous êtes automatiquement remboursé.
                </p>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="p-4 text-center">
            <img src="/assets/images/abort.jpg" alt="abord" class="img-fluid">
            </div>
          </div>
        </div>
      </section>
    </div>

    @endsection
    <script>
        var nb_page=1;
        const getArtisteFromAjax = (formId) =>{
            $.ajax({
                type: 'GET',
                url: "{{ route('getArtiste','') }}/"+nb_page,
                data: {page:nb_page},
                dataType: 'JSON',

                beforeSend: function(){
                    // NProgress.configure({ parent: '#loader' });
                    NProgress.start();
                    // $('#test').html('');
                },
                success: function(datas){
                    NProgress.done();
                    NProgress.remove();
                    console.log(datas);
                    var contenuTableau="";
                    if(datas.length > 0){
                        nb_page++;
                    }
                    datas.forEach(function(index)
                        {
                            contenuTableau+=
                            `            <div class="col-md-2 mt-3">
                                                <a  @if (auth()->check())
                                                    href="{{route('artistes.show','')}}/${index['id']}"
                                                @else
                                                    href="#" data-toggle="modal" data-target="#modalLogin"
                                                @endif class="text-decoration-none" >
                                                <div class="p-3 box-shadow rounded ">
                                                    <div class="">
                                                    <img src="${index['image']}" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="pt-2">
                                                    <h6 class="text-white font-weight-bold">${index['username']}</h6>
                                                    <p class="text-white">${index['username']}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>`;
                        });
                        $('#test').append(contenuTableau);
                },
                error: function(xhr){
                    NProgress.done();
                    NProgress.remove();
                    alert('Erreur de chargement');


                    // $('.loading').LoadingOverlay("hide");
                    // if(xhr.responseJSON.message!=undefined){
                    //     swal({
                    //         title: 'Echec...',
                    //         text: xhr.responseJSON.message,
                    //         type: "error",
                    //         showConfirmButton: true,
                    //     })
                    // }
                }
            });
        }
    </script>
