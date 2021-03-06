<main class="container-fluid">
  <div class="row">
    <!--progression-->
    @include('includes.adminMenu')

    <!--end progression-->
    <!--main content-->
    <div class="col-md-9 main-content p-3">
      <div class="row">
        <div class="col-md-12 py-4 pr-b">
          <p class="h4"><span class="bg-primary p-2 shadow rounded-lg"><i class="fas fa-users text-white"></i></span>La liste des utilisateurs </p>
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
                  <th scope="col">Nom</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                  <th scope="col">Rôle</th>
                </tr>
              </thead>
              <tbody id="contentUsers">
                <tr class="filter">
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>OttoOttoOttoOttoOttoOtto</td>
                  <td><button type="button" class="btn btn-primary"><i class="far fa-edit"></i></button></td>
                  <td>
                    <form class="" action="index.html" method="post">
                      <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Admin</option>
                          <option>Artiste</option>
                          <option>Defaut</option>
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
