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
              <h3>Mes commandes</h3>

              <!-- <form>
                <div class="form-group mb-0">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                    <option>Lorem ipsum dolor</option>
                  </select>
                </div>
              </form> -->
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
        <div class="row">

            @isset($purchases)
                @foreach ($purchases as $purchase)
                    <div class="col-md-6 mt-3">
                        <div class="card card-shadow wprock-img-zoom-hover" data-toggle="modal" data-target="#modalLogin">

                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$purchase->name}}</h5>
                                <p class="card-text">
                                    @foreach ($users as $user)
                                        @if ($user->id = $purchase->user_id)
                                            {{$user->username}}
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <p>Statut : <span class="font-weight-bold">{{$purchase->status}}</span></p>
                                <p class="text-muted" style="font-weight:bold">{{number_format($purchase->price, 0, '.', ' ')}} F CFA</p>
                                @if ($purchase->medias_id != null)
                                    <p class="text-muted btn" onclick="getMedia({{$purchase->medias_id}},{{$purchase->purchase_id}})">Voir l'extrait</p>
                                @endif
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>

        <!--div class="row mt-3 p-2">
          <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" style="height: 250px;">
                <div class="carousel-item active">
                  <img src="https://images.unsplash.com/photo-1573164574230-db1d5e960238?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" class="d-block w-100 img-fluid" alt="...">
                  <div class="carousel-caption d-none d-md-block bg-dark">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://oschoolelearning.com/images/divers/corporate-1.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
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
