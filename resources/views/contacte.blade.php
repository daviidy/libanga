
@extends('layouts.menu')
@section('content')

<section class="bg-contacte d-flex flex-column justify-content-center position-relative">
  <div class="container">
    <div class="row justify-content-md-center align-items-center">
      <div class="col-md-12">
        <div class="">
          <div class="">
            <h1 class="text-center text-white font-weight-bold">Contactez-nous</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container-fluid">
  <h1 class="text-center text-white font-weight-bold py-md-5 h3 p-3">Pour plus de renseignement, contactez-nous</h1>

  <div class="row p-md-5">
    <div class="col-md-6">
      <div class="d-flex flex-column text-white">
        <div class="p-3">
          <p class="h6 font-weight-bold">Libanga</p>
          <p>Siret 88484942300014</p>
          <p>Mail : contact@libanga.fr</p>
          <p>Directeur de publication : Christ Henriti</p>
        </div>
      </div>
      </div>
      <div class="col-md-6">
        <div class="bg-white p-3 shadow">
          <form>
            <div class="form-row pb-3">

              <div class="col">
                <label >Nom</label>
                <input type="text" class="form-control" >
              </div>
              <div class="col">
                <label >Prenom</label>
                <input type="text" class="form-control" >
              </div>
            </div>

            <div class="form-group pb-3">
              <label for="exampleInputEmail1">Adresse email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="form-group pb-3">
              <label for="exampleFormControlTextarea1">Votre commentaire</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
        </div>
      </div>
    </div>

</section>

@endsection
