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
          <div class="card w-100 p-3 card-shadow cusor">
            <img src="{{($artistes->image) ? asset($artistes->image) : asset("assets/images/users/avatar_default.png")}}" class="card-img-top rounded-circle img-fluid text-center m-auto avatar-card" alt="...">
            <h5 class="h4 card-title text-center pt-2 font-weight-bold">{{$artistes->username}}</h5>
            {{-- <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> --}}
            {{-- <a href="#" class="btn btn-primary mt-3">Me contatez</a> --}}
            <hr>
            <div class="card-body">
              <ul class="list-group">
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-map-marker-alt"></i> Pays</span>
                  {{$artistes->pays}}
                </li>
                {{-- <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-microphone-alt"></i> Artiste depuis</span>
                  {{Carbon::parse($artistes->created_at)->translatedFormat('d F Y') }}
                </li> --}}
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-record-vinyl"></i> Albums</span>
                  {{$nb_albums_count}}
                </li>
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class=""><i class="fas fa-record-vinyl"></i> Chansons</span>
                    @isset($chansons)
                    @foreach ($chansons as $chanson)
                        {{$chanson->title}}<br>
                    @endforeach
                   @endisset
                </li>
              </ul>
            </div>
          </div>

          {{-- <div class="card w-100 p-3 mt-3 card-shadow">
            <div class="card-body">
              <h5 class="card-title font-weight-bold h5 text-uppercase">Titre à succès</h5>
              <p class="card-text"> <span class="h6 font-weight-bold">Kpangor :</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
          </div> --}}

          <div class="card w-100 p-3 mt-3 card-shadow cusor">
            <div class="card-body">
              <h5 class="card-title font-weight-bold h5 text-uppercase">Description</h5>
              <p class="card-text">{{$artistes->user_description}}</p>
            </div>
          </div>

        </div>
        <div class="col-md-8">
          <div class="mt-3 mt-md-0">
            <div class="bg-white p-md-4 p-3 mb-3 card-shadow cusor">
              <h3 class="h3 font-weight-bold">Mes services</h3>
            </div>
            @if($message = Session::get('error'))
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        {!! $message !!}
                    </div>
                </div>
                <?php Session::forget('error');?>
            @endif
            @if($message = Session::get('success'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {!! $message !!}
                    </div>
                </div>
                <?php Session::forget('success');?>
            @endif
            <div class="">
              <div class="container-fluid">
                <div class="row">
                  @isset($services)
                      @foreach ($services as $service)

                  <div class="col-md-6 mb-3">
                    <div class="card card-shadow cusor" data-toggle="modal" data-target="#modalLogin">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{$service->name}}</h5>
                        <p class="card-text">{{$service->service_description}}</p>
                      </div>
                      <div class="card-footer bg-white d-flex justify-content-between align-items-center p-2">
                        <a  onclick="commandeModalShow({{$service->id}})"> <i class="fas fa-heart"></i> Commander</a>
                        <p class="text-muted" style="font-weight:bold">{{number_format($service->price,0,'.',' ')}} €</p>
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
      </div>
    </div>
  </section>

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
                <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" alt="" class="img-fluid rounded-circle avatar-login-img">
              </div>
                <div class="">
                  <p class="w-75 mx-auto mb-0 text-center h4 pt-3">Commander ce service</p>
                </div>
                <div class="text-left mt-md-5 my-4 text-center">
                    <form action="{{route('paypal')}}" method="post">
                            @csrf
                             <button type="submit" class="text-decoration-none box-hover h-auto rounded-pill py-3 px-md-5 px-4 mt-3 mb-5 text-white btn-h btn-shadow">Commander maintenant</button>
                            <input type="hidden" name="user_id">
                            <input type="hidden" name="id">
                            <input type="hidden" name="price">
                            <input type="hidden" name="name">
                    </form>
                  {{-- <a href="{{ route('make.payment') }}" class="text-decoration-none box-hover h-auto rounded-pill py-3 px-md-5 px-4 mt-3 mb-5 text-white btn-h btn-shadow">Commander maintenant</a> --}}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
    const commandeModalShow = (service_id) =>{

        $('#modalLogin').modal('show');
        $.ajax({
                type: 'GET',
                url: "{{ route('services.edit','"+service_id+"')}}",
                data: {service_id:service_id},
                dataType: 'JSON',

                beforeSend: function(){
                },
                success: function(datas){
                    for (var key in datas) {
                        console.log(datas)
                            //Remplissage de tous les champs input du modal
                            $("input[name='"+key+"']").val(datas[key])
                        }
                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }

</script>
