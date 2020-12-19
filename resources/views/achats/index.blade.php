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
                  <th scope="col">Modifier l'état de la commande</th>
                </tr>
              </thead>
              <tbody id="contentArtist">
                <tr class="filter">
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Dj Leo</td>
                  <td>30000 Fcfa</td>
                  <td>En cours</td>
                  <td>
                    <form class="" action="index.html" method="post">
                      <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>En cours de traitement</option>
                          <option>Annuler</option>
                          <option>Terminer</option>
                        </select>
                      </div>
                    </form>
                  </td>
                </tr>
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
