@php
    use Carbon\Carbon;
    Carbon::setLocale('fr');
@endphp

@extends('layouts.menu_connecte')
@section('content')

  <section class="mt-5 pt-5 col">
    <div class="conntainer-fluid p-md-4">
      <div class="row">
        <div class="col-md-4">
          <div class="card w-100 p-md-3 card-shadow">
            <img src="{{(auth()->user()->image) ? asset(auth()->user()->image) : asset("/assets/images/users/avatar_default.png")}}" class="card-img-top rounded-circle img-fluid text-center m-auto avatar-card" alt="...">
            <h5 class="h4 card-title text-center pt-2 font-weight-bold"></h5>
            <p class="card-text text-center">{{auth()->user()->username}}</p>
            {{-- <a href="#" class="btn btn-primary mt-3">Me contatez</a> --}}
            <hr>
            <ul>
                <li><a href="{{ route('dashboard')}}" class="list-group-item d-flex justify-content-between align-items-center border-0">Tableau de bord</a></li>
                <li><a onclick="showEditModal({{auth()->user()->id}})" class="list-group-item d-flex justify-content-between align-items-center border-0" >Modifier mon profil</a></li>
            </ul>
            <hr>
            <div class="card-body p-0">
              <ul class="list-group">
                <li class="border-0 list-group-item d-flex justify-content-between align-items-center">
                  <span class="align-items-center justify-content-center d-flex"><i class="fas fa-record-vinyl pr-2"></i> Albums :</span>
                  {{$albums->title}}
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="mt-3 mt-md-0">
            <div class="bg-white p-md-4 p-3 mb-3 card-shadow">
                <div class="align-items-center bg-white border-0 d-flex justify-content-between list-group-item">
                    <h3>Mes chansons</h3>
                    <form>
                      <div class="form-group mb-0">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddChanson">Ajouter Chanson</button>
                      </div>
                    </form>
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
            <div class="row" id="service">
              <div class="px-3">
                <img src="/assets/images/song.png" alt="" class="img-fluid w-100" style="height:250px">
              </div>
                @isset($chansons)
                @foreach ($chansons as $chanson)
                    <div class="col-md-12 mt-3 text-white">
                        <div class="card-shadow d-flex justify-content-between align-items-center border-bottom p-3">
                              <div class="d-flex align-items-center">
                                <i class="fas fa-play"></i>
                                <h5 class="font-weight-bold pl-3">{{$chanson->title}}</h5>
                              </div>
                              <div class="d-flex align-items-center left">
                                {{-- <i class="fas fa-cog"></i>
                                <i class="fas fa-cloud-download-alt"></i>
                                <i class="fas fa-download"></i> --}}
                                <form action="{{ route('chansons.destroy', $chanson->id)}}" method="post">
                                    @csrf @method('DELETE')
                                    <button class="text-primary bg-white border-0" onclick="showEditChanson({{$chanson->id}})" type="button">
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
  </section>

  <!-- Modal ->
  <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="modalLoginLabel">Commander mes services</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div-->

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
                  <p class="w-75 mx-auto mb-0 text-center h4 pt-3">Commander mes services</p>
                </div>
                <div class="text-left mt-md-5 my-4 text-center">
                  <a href="#" class="text-decoration-none box-hover h-auto rounded-pill py-3 px-md-5 px-4 mt-3 mb-5 text-white btn-h btn-shadow">Commander maintenant</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.usersPopup.popupEditDefault')
  @include('includes.usersPopup.popupAddChanson')
  @include('includes.usersPopup.popupEditChanson')

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

                            //Remplissage de tous les champs input du modal
                            $("input[name='telephone']").val(datas['telephone'])
                            $("select[name='pays']").val(datas['pays'])
                            $("input[name='city']").val(datas['city'])
                            $("input[name='state']").val(datas['state'])
                            $("textarea[name='user_description']").val(datas['user_description'])
                            $("textarea[name='description']").val(datas['description'])

                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }
    const showEditChanson = (chanson_id) =>{

        $('#modalEditChanson').modal('show');
        $("#edit-chanson").attr('action',"{{route('chansons.update','')}}/"+chanson_id)
        $.ajax({
                type: 'GET',
                url: "{{ route('chansons.edit','"+chanson_id+"')}}",
                data: {chanson_id:chanson_id},
                dataType: 'JSON',

                beforeSend: function(){
                },
                success: function(datas){

                        console.log(datas)
                            //Remplissage de tous les champs input du modal
                            for (var key in datas) {
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
