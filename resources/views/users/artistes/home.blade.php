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
                <div class="form-group mb-0">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddService">Ajouter Service</button>
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
                                <button class="btn btn-primary" onclick="showEditService({{$service->id}})" type="button">Modifier</button>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>


                            <p class="text-muted" style="font-weight:bold">{{number_format($service->price, 0, '.', ' ')}} F CFA</p>
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

@endsection
<script>
    const submitForm = (form_id,divId=null) => {
        form=$("#"+form_id)
            // e.preventDefault()
            $.ajax({
                url:    form.attr('action'),
                type    : form.attr('method'),
                data    : form.serialize(),
                // dataType: 'json',
                beforeSend: function(data){
                    NProgress.start();
                },
                success: function (data) {
                    NProgress.done();
                    NProgress.remove();
                    var divContent="";

                    if(data.message!=undefined){
                        // Create an instance of Notyf
                        var notyf = new Notyf({position: {x: 'right',y: 'top'}});
                        // Display a success notification
                        notyf.success(data.message);
                    }
                    form.trigger("reset");
                    $('.modal').modal('hide');
                    //Suppression des erreurs
                    $('div').removeClass('has-error');
                    $('small.text-danger').remove();

                        divContent=`<div class="col-md-4 mt-3">
                        <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">

                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">${data.data['name']}</h5>
                                <p class="card-text">${data.data['service_description']}</p>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <p>
                                    <a href="#"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;
                                    <a href="#"><i class="fas fa-edit"></i></a>
                                </p>

                                <p class="text-muted" style="font-weight:bold">${data.data['price']} F CFA</p>
                            </div>
                        </div>
                    </div>
                    `;
                    $('#service').append(divContent);
                    },
                error:function(xhr){

                    NProgress.done();
                    NProgress.remove();
                    //Message
                    if(xhr.responseJSON.message!=undefined && typeof(xhr.responseJSON.message)!='object'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: xhr.responseJSON.message
                            });

                    }
                    // alert(Object.getOwnPropertyNames(xhr.responseJSON.errors))
                    //Affichage des erreurs
                    $('div').removeClass('has-error');
                    $('small.text-danger').remove();
                    $.each(xhr.responseJSON.message, function(key,value) {
                        //Affichage des erreurs
                        $('div.'+key).addClass('has-error');
                        $('div.'+key).append('<small class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>  '+value+'</small>');
                    })
                }
            });
    }

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
