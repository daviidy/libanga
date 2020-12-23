@extends('layouts.menuAdmin')
@section('content')

    <main class="container-fluid">
      <div class="row">
        <!--progression-->
        @include('includes.adminMenu')

        <!--end progression-->
        <!--main content-->
        <div class="col-md-9 main-content p-3">
            <div class="row">
              <div class="col-md-12 py-4 pr-b">
                <p class="h4"><span class="bg-primary p-2 shadow rounded-lg"><i class="fas fa-house-user text-white"></i></span> Administrateur </p>              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
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
                <div class="table-responsive-md">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Email</th>
                          <th scope="col">Rôle</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="contentUsers">
                          @isset($users)
                              @foreach ($users as $user)
                                <tr class="filter">
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                    {{-- <form class="" action="index.html" method="post">
                                        <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Admin</option>
                                            <option>Artiste</option>
                                            <option>Defaut</option>
                                        </select>
                                        </div>
                                    </form> --}}
                                    {{$user->type}}
                                    </td>
                                    <td>
                                        <form action="{{ route('destroy.users', $user->id)}}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="button" onclick="showEditModal({{$user->id}})" class="btn btn-primary"><i class="far fa-edit"></i></button>

                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                              @endforeach
                          @endisset

                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        <!--end main content-->
        <div id="overlay"></div>
      </div>
    </main>
    @include('includes.usersPopup.popupEditUser')
@endsection

<script>


    const showEditModal = (user_id) =>{

        $('#modalEditUser').modal('show');
        $("#edit-user").attr('action',"{{route('updateByAdmin.users','')}}/"+user_id)
        $.ajax({
                type: 'GET',
                url: "{{ route('editByAdmin.users','edit')}}"+user_id,
                data: {user_id:user_id},
                dataType: 'JSON',

                beforeSend: function(){
                },
                success: function(datas){
                        console.log(datas)
                            //Remplissage de tous les champs input du modal
                            $("input[name='user_id']").val(datas['id'])
                            $("select[name='type']").val(datas['type'])

                },
                error: function(xhr){
                    console.log(xhr)
                    alert('Erreur de chargement');
                }
            });
    }
</script>
