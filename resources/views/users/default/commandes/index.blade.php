@php
    use Carbon\Carbon;
@endphp
@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">
    <div class="row">
      <!--progression-->
      @include('includes.menuLeftDashboard.menuDefautLeft')
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
                <h5 class="">Mes commandes</h5>
                <!--p class="font-weight-lighter mt-2">Updated 29 nov</p-->
              </div>
              <!--p class="rounded-lg mr-4 p-2 border btn">
                <span class="mr-2"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/></svg></span>
                Star
              </p-->
              <form>
                <div class="form-group mb-0">
                    <button type="button" class="btn btn-primary">
                        <a href="/nosartistes">Nouvelle commande</a>
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @if(session('status'))
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            </div>
        @endif
        @if(session('erreur'))
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    {{session('erreur')}}
                </div>
            </div>
        @endif
        <div class="row p-3" id="service">

            @isset($purchases)
                @foreach ($purchases as $purchase)
                    <div class="col-md-6 mt-3">
                        <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                            {{-- <a href="#" class="text-decoration-none"> --}}
                            {{-- <div class="wprock-img-zoom">
                                <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                            </div> --}}
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"> {{$purchase->name}}
                                    @if ($purchase->media_id != null)
                                        @if ($purchase->purchase_state == "C'est parfait!")
                                        <span class="badge badge-success">Validé par le client</span>
                                        @elseif($purchase->purchase_state == "A refaire")
                                            <span class="badge badge-danger">A refaire</span>
                                        @else
                                            <span class="badge badge-warning">En attente d'appréciation</span>
                                        @endif
                                    @endif


                                </h5>
                                <p class="card-text">
                                    @foreach ($users as $user)
                                        @if ($user->id == $purchase->user_id)
                                        Artiste : {{$user->username}}
                                        @endif
                                    @endforeach
                                </p>
                                <p>Date commande : {{ Carbon::parse($purchase->purchase_creation)->format('Y-m-d')}}</p>
                                <p class="card-text"><span  style="font-weight: bold">Nom(s) à dédicacer : </span>{{$purchase->names}}</p>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <p>Commande payée <span class="font-weight-bold">({{$purchase->status}})</span></p>
                                <p class="text-muted" style="font-weight:bold">{{number_format($purchase->price, 0, '.', ' ')}} €</p>
                                @if ($purchase->media_id != null)
                                    <p class="btn font-weight-bold text-danger" onclick="getMedia({{$purchase->media_id}},{{$purchase->purchase_id}})">Voir l'extrait</p>
                                @endif
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
      </div>
      <!--end main content-->
      <div id="overlay"></div>
    </div>
  </main>
  @include('includes.usersPopup.popupEditDefault')
  @include('includes.usersPopup.popupShowMedia')


@endsection
<script>


    const showEditModal = (user_id) =>{

        $('#modalEditDefault').modal('show');
        $("#edit-user").attr('action',"{{route('update.users','')}}/"+user_id)
        $.ajax({
                type: 'GET',
                url: "{{ route('edit.users','edit')}}"+user_id,
                // data: {user_id:user_id},
                dataType: 'JSON',

                beforeSend: function(){
                },
                success: function(datas){
                    console.log(datas);

                            //Remplissage de tous les champs input du modal
                            //$("input[name='telephone']").val(datas['telephone'])
                            $("select[name='pays']").val(datas['pays'])
                            $("input[name='city']").val(datas['city'])
                            $("textarea[name='user_description']").val(datas['user_description'])
                            $("textarea[name='description']").val(datas['description'])

                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }

    const getMedia = (media_id,purchase_id) =>{
    console.log(media_id,purchase_id)
    $('#modalMedia').modal('show');
    $("#update-purchase").attr('action',"{{route('updateCommande')}}")
    $.ajax({
            type: 'GET',
            url: "{{ route('medias.show','')}}/"+media_id,
            data: {media_id:media_id},
            dataType: 'JSON',

            beforeSend: function(){
            },
            success: function(datas){
                console.log(datas)
                    $("#media-link").attr('href',"/"+datas.media)
                    $("input[name='purchase_id']").val(purchase_id)
            },
            error: function(xhr){
                console.log(xhr)
                alert('Erreur de chargement');
            }
        });
}
</script>
