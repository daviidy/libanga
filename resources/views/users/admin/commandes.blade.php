
@php
    use Carbon\Carbon;
@endphp
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
                <p class="h4"><span class="bg-primary p-2 shadow rounded-lg"><i class="fas fa-shopping-bag text-white"></i></span>La liste des commandes </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="py-md-5 pt-3 d-md-flex justify-content-between align-items-center">
                  <!--h2 class="h1 text-white font-weight-bold text-uppercase">Nos artistes</h2-->
                  <div class="form-row">
                    <div class="col-auto">
                      <input type="text" class="form-control" placeholder="Filtrer par nom ou par mail" id="courseSearch">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
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
              <div class="col-md-12">
                <div class="table-responsive-md">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Clients</th>
                        <th scope="col">Artistes concernés</th>
                        <th scope="col">Montant de l'achat</th>
                        <th scope="col">Etat de la commande</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Modifier l'état de la commande</th>
                      </tr>
                    </thead>
                    <tbody id="contentArtist">
                        @isset($purchases)
                            @foreach ($purchases as $purchase)
                                <tr class="filter">
                                    <th scope="row">{{$purchase->id}}</th>
                                    <td>{{$purchase->username}}</td>
                                    <td>
                                        @foreach ($users as $user)
                                            @if ($user->id == $purchase->artiste)
                                                {{$user->username}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{number_format($purchase->price,0,'.',' ').' €'}}</td>
                                    <td>{{$purchase->status}}</td>
                                    {{-- <td>{{Carbon::parse($purchase->created_at)->format('Y-m-d')}}</td> --}}
                                    <td>{{$purchase->created_at}}</td>
                                    <td>
                                    <form class="" action="{{route('updateCommande')}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="purchase_state">
                                                <option value="en cours">En cours de traitement</option>
                                                <option value="annuler">Annuler</option>
                                                <option value="terminer">Terminer</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
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
