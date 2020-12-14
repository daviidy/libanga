@extends('layouts.menu_connecte')
@section('content')

  <main class="container-fluid">
    <div class="row">
      <!--progression-->
      @include('includes.menuLeftDashboard.menuLeftAlbum')
      <!--end progression-->
      <!--main content-->
      <div class="col-md-9 main-content">
        <div class="row">
          <div class="col-md-12 mt-4 pt-2">
            <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item">
              <h3>Gestion des Albums</h3>
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
                                <button class="btn btn-primary" onclick="showEditAlbum({{$album->id}})" type="button">Modifier</button>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <a href="{{route('albums.show',$album->id)}}" class="fas fa-eye">Voir</a>
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
                    for (var key in datas) {
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
