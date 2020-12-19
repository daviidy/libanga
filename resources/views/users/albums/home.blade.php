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
              <h3>Mes albums</h3>
              <form>
                <div class="form-group mb-0">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddAlbum">Ajouter Album</button>
                </div>
              </form>
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
            @isset($albums)
            @foreach ($albums as $album)
                <div class="col-md-4 mt-3">
                    <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">
                        {{-- <a href="#" class="text-decoration-none"> --}}
                          {{-- <div class="wprock-img-zoom">
                            <img src="https://togotribune.com/wp-content/uploads/2019/08/apres_la_mort_darafat_dj_un_autre_malheur_frappe_sa_famille.jpg" class="card-img-top" alt="...">
                          </div> --}}
                          <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$album->title}}</h5>
                            <p class="card-text">{{$album->service_description}}</p>
                          </div>
                          <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                            <form action="{{ route('albums.destroy', $album->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="text-primary" onclick="showEditAlbum({{$album->id}})" type="button">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                                </button>
                                <button class="text-danger" type="submit">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg>
                                </button>
                            </form>
                            <a href="{{route('albums.show',$album->id)}}"><i class="fas fa-eye"></i> Voir</a>
                            {{-- <p class="text-muted" style="font-weight:bold">{{number_format($album->price, 0, '.', ' ')}} F CFA</p> --}}
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
  @include('includes.usersPopup.popupEditAlbum')
  @include('includes.usersPopup.popupAddAlbum')
  @include('includes.usersPopup.popupEditDefault')


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
                            $("input[name='telephone']").val(datas['telephone'])
                            $("input[name='pays']").val(datas['pays'])
                            $("input[name='city']").val(datas['city'])
                            $("textarea[name='user_description']").val(datas['user_description'])


                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }

    const showEditAlbum = (album_id) =>{

    $('#modalEditAlbum').modal('show');
    $("#edit-album").attr('action',"{{route('albums.update','')}}/"+album_id)
    $.ajax({
            type: 'GET',
            url: "{{ route('albums.edit','"+album_id+"')}}",
            data: {album_id:album_id},
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
