<div class="col-3 d-none side-menu d-md-block bg-menu mt-5 pt-5">
  <div class="mb-md-4 mb-2">
    <div>
    <div class="accordion" id="accordionExample">
      <div class="card border-0 rounded-0">
        <div class="card-header bg-menu" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left bg-menu" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <div class="bg-menu">
                <span><i class="fas fa-house-user"></i></span>
                Tableau de bords
              </div>
              <span><span><i class="fas fa-angle-right"></i></span></span>
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body list-group pcard-boxm rounded-0">
            <a href="{{ route('dashboard')}}" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Accueil</a>
          </div>
        </div>
      </div>
      <div class="card border-0 rounded-0">
        <div class="card-header bg-menu" id="headingTwo">
          <h2 class="mb-0">
            <button class="bg-menu btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <div class="">
                <span><i class="far fa-gem"></i></span>
                Utilisateurs
              </div>
              <span><i class="fas fa-angle-right"></i></span>
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body list-group pcard-boxm rounded-0">
            <a href="{{route('users.index')}}" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Admin</a>
          </div>
          <div class="card-body list-group pcard-boxm rounded-0">
            <a href="{{route('users.index_artistes')}}" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Artistes</a>
          </div>
          <div class="card-body list-group pcard-boxm rounded-0">
            <a href="{{route('users.index_default')}}" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Default</a>
          </div>
        </div>
      </div>

      <div class="card border-0 rounded-0">
        <div class="card-header bg-menu" id="headingThree">
          <h2 class="mb-0">
            <button class="bg-menu btn btn-link text-decoration-none d-flex justify-content-between align-items-center btn-block text-left collapsed bg-heard" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <div class="">
                <span><i class="fas fa-shopping-bag"></i></span>
                Les commandes
              </div>
              <span><i class="fas fa-angle-right"></i></span>
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body list-group pcard-boxm rounded-0">
            <a href="{{route('listeCommandes')}}" class="list-group-item text-decoration-none border-0 list-group-item text-decoration-none border-0-action">Liste des commandes</a>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>
