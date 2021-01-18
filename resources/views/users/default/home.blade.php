@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">
    <div class="row">
      <!--progression-->
      @include('includes.menuLeftDashboard.menuDefautLeft')
      <!--end progression-->
      <!--main content-->
      <div class="col-md-9 main-content">
        <div class="row">
          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item">
              <h3>Mon Profil</h3>
            </div>
          </div>
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

    <div class="pt-md-5 py-4 ">

      <div class="row row-cols-1 row-cols-md-2">
        <div class="col-md-3 d-md-block d-none"> </div>
        <div class="col-md-6">
          <div class="card box-shadows p-1">
            <div class="text-center px-md-5 ">
              <img src="{{(auth()->user()->image) ? asset(auth()->user()->image) : asset("/assets/images/users/avatar_default.png")}}" class="card-img-top p-2 img-fluid rounded-circle w-25 mx-auto" alt="...">
              <h3 class="font-weight-bold text-center ">Arsene Kouassi</h3>
            </div>
            <div class="card-body p-md-5 p-2">
                <ul class="list-group text-md-center">
                    <li class="align-items-center border-0 list-group-item justify-content-between d-md-flex">
                      <!--span class=""><i class="bi bi-person-circle h2"></i></span-->
                      <span class="font-weight-bold badge">Nom : </span>{{auth()->user()->username}}
                    </li>
                    <li class="align-items-center border-0 list-group-item justify-content-between d-md-flex">
                      <!--span class=""><i class="bi bi-envelope h2"></i></span-->
                      <span class="font-weight-bold badge">Email : </span>{{auth()->user()->email}}
                    </li>
                  </ul>
              <div class="py-3 text-center">
                <a href="#" onclick="showEditModal({{auth()->user()->id}})" class="btn card-image-bg shadow-sm text-btn-size text-white font-weight-bold">Modifier mon profil</a>
                <!--a href="#" class="btn border ml-md-2 mt-4 mt-md-0 text-btn-size font-weight-bold">Publier un projet</a-->
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-md-block d-none"></div>
      </div>
    </div>


        <!--div class="row">

            @isset($purchases)
                @foreach ($purchases as $purchase)
                    <div class="col-md-6 mt-3">
                        <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">

                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$purchase->name}}</h5>
                                <p class="card-text">
                                    @foreach ($users as $user)
                                        @if ($user->id == $purchase->user_id)
                                            {{$user->username}}
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <p>Statut : <span class="font-weight-bold">{{$purchase->status}}</span></p>
                                <p class="text-muted" style="font-weight:bold">{{number_format($purchase->price, 0, '.', ' ')}} €</p>
                                @if ($purchase->media_id != null)
                                    <p class="text-muted btn" onclick="getMedia({{$purchase->media_id}},{{$purchase->purchase_id}})">Voir l'extrait</p>
                                @endif
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            @endisset
        </div-->


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
