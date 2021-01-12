@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">

    <div class="row">
      <!--progression-->
      @include('includes.menuLeftDashboard.menuLeftArtiste')
      <!--end progression-->
      <!--main content-->
      <div class="col-md-9 main-content">
        <div class="row">

          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item">
              <h3>Tableau de Bord Artiste | Mes Commandes</h3>
            </div>
            @if(session('status'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                </div>
            @endif
          </div>
        </div>
        <div class="row" id="service">

            @isset($purchases)
                @foreach ($purchases as $purchase)
                    <div class="col-md-6 mt-3">
                        <div class="card card-shadow wprock-img-zoom-hover cusor" data-toggle="modal" data-target="#modalLogin">
                            {{-- <a href="#" class="text-decoration-none"> --}}
                            {{-- <div class="wprock-img-zoom">
                                <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                            </div> --}}
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$purchase->name}}</h5>
                                <div>
                                    <p class="card-text">{{$purchase->media_name}}</p>
                                    @if (!is_null($purchase->media_id))

                                        <form action="{{route('medias.destroy',$purchase->media_id)}}" method="post" style="display: inline-block">
                                            @csrf @method('DELETE')

                                            <button class="text-danger bg-white border-0" type="submit">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                              </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>


                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <p>Statut : <span class="font-weight-bold">{{$purchase->status}}</span></p>
                                <p class="text-muted" style="font-weight:bold">{{number_format($purchase->price, 0, '.', ' ')}} €</p>
                                @if (is_null($purchase->media_id) )
                                    <p class="text-muted btn" onclick="getPurchase({{$purchase->id}})">Ajouter un extrait </p>
                                @endif

                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>


        {{-- <div class="row p-3">
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
        </div> --}}


      </div>
      <!--end main content-->
      <div id="overlay"></div>
    </div>
  </main>
  @include('includes.usersPopup.popupEditDefault')
  @include('includes.usersPopup.popupAddService')
  @include('includes.usersPopup.popupEditService')
  @include('includes.usersPopup.popupAddMedia')

@endsection
<script>

const showEditModal = (user_id) =>{
        // alert(user_id)
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
    const getPurchase = (purchase_id) =>{
        console.log(purchase_id)
        $('#modalAddMedia').modal('show');
        $("#add-media").attr('action',"{{route('medias.store')}}")
        $.ajax({
                type: 'GET',
                url: "{{ route('edit.ArtistePurchase','"+purchase_id+"')}}",
                data: {purchase_id:purchase_id},
                dataType: 'JSON',

                beforeSend: function(){
                },
                success: function(datas){
                    console.log(datas)
                    $("input[name='purchase_id']").val(datas['id'])
                    $("input[name='service_id']").val(datas['service_id'])
                    $("input[name='status']").val(datas['status'])
                    $("input[name='user_id']").val(datas['user_id'])
                    $("input[name='purchase_state']").val(datas['purchase_state'])
                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }
</script>
