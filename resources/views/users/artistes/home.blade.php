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
              <h3>Tableau de Bord Artiste</h3>
              <form>
                {{-- <div class="form-group mb-0">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddService">Ajouter Service</button>
                </div> --}}
              </form>
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
          </div>
        </div>

        <div class="pt-md-5 py-4 ">

          <div class="row row-cols-1 row-cols-md-2">
            <div class="col-md-3 d-md-block d-none"> </div>
            <div class="col-md-6">
              <div class="card box-shadows p-1">
                <div class="text-center px-md-5 ">
                  <img src="{{(auth()->user()->image) ? asset(auth()->user()->image) : asset("/assets/images/users/avatar_default.png")}}" class="card-img-top p-2 img-fluid rounded-circle w-25 mx-auto" alt="...">
                  <h3 class="font-weight-bold text-center ">{{auth()->user()->username}}</h3>
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
                    <a href="#" class="btn border ml-md-2 mt-4 mt-md-0 text-btn-size font-weight-bold" data-toggle="modal" data-target="#modalAddService">Ajouter Service</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-md-block d-none"></div>
          </div>
        </div>


        <!--div class="row" id="service">

            @isset($services)
            @foreach ($services as $service)
                <div class="col-md-4 mt-3">
                    <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                        {{-- <a href="#" class="text-decoration-none"> --}}
                          {{-- <div class="wprock-img-zoom">
                            <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                          </div> --}}
                          <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$service->name}}</h5>
                            <p class="card-text">{{$service->service_description}}</p>
                          </div>
                          <div class="card-footer bg-white d-flex justify-content-between align-items-center">

                                {{-- <a href="#"><i class="fas fa-trash"></i></a>&nbsp;&nbsp; --}}


                            <form action="{{ route('services.destroy', $service->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="text-primary bg-white border-0" onclick="showEditService({{$service->id}})" type="button">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                                </button>
                                <button class="text-danger bg-white border-0" type="submit">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg>
                                </button>
                            </form>


                            <p class="text-muted" style="font-weight:bold">{{number_format($service->price, 0, '.', ' ')}} € </p>
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
  @include('includes.usersPopup.popupAddService')
  @include('includes.usersPopup.popupEditService')

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
    const showEditService = (service_id) =>{

        $('#modalEditService').modal('show');
        $("#edit-service").attr('action',"{{route('services.update','')}}/"+service_id)
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
                            $("textarea[name='"+key+"']").val(datas[key])
                            $("select[name='"+key+"']").val(datas[key])
                        }
                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }
</script>
