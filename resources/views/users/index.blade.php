<main class="container-fluid">
  <div class="row">
    <!--progression-->
    @include('includes.adminMenu')

    <!--end progression-->
    <!--main content-->
    <div class="col-md-9 main-content p-3">
      <div class="row">
        <div class="col-md-12 py-4 pr-b">
          <p class="h4"><span class="bg-primary p-2 shadow rounded-lg"><i class="fas fa-users text-white"></i></span> Les utilisateurs </p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
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
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <!--end main content-->
    <div id="overlay"></div>
  </div>
</main>
