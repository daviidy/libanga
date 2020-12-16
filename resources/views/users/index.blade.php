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
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>OttoOttoOttoOttoOttoOtto</td>
                  <td><button type="button" class="btn btn-primary"><i class="far fa-edit"></i></button></td>
                  <td>
                    <form class="" action="index.html" method="post">
                      <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
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
