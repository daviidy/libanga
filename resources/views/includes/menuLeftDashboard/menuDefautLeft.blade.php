<div class="col-3 d-none side-menu d-md-block bg-main">
  <div class="bg-white mt-5 p-3 mb-4">
    <div>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          <img class="rounded-circle img-fluid user-avatar" src="https://secure.gravatar.com/avatar/9c275cba24f7c939201cda28f832f8e0?s=80" alt="User">
          <span>{{auth()->user()->username}}</span>
        </li>
      </ul>
    </div>

    <hr>

    <div>
      <div>
        <ul class="list-group">
          <li><a href="#" class="list-group-item d-flex justify-content-between align-items-center border-0">Tableau de bord</a></li>
          <li><a href="#" class="list-group-item d-flex justify-content-between align-items-center border-0" data-toggle="modal" data-target="#modalEditDefault">Modifier mon profil</a></li>
          <li><a href="/commande" class="list-group-item d-flex justify-content-between align-items-center border-0">Mes commandes</a></li>
        </ul>
      </div>
    </div>

    <!--hr>
    <div class="">
      <div class="">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0">
            Cras justo odio
            <span class="">0$</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0">
            Dapibus
            <span >N/A</span>
          </li>
        </ul>
      </div>
    </div-->
  </div>

  <!--div class="mb-md-4 mb-2">
    <div >
      <ul class="list-group">
        <li class="py-md-4 list-group-item d-flex justify-content-between align-items-center border-0">
          <span>Inbox</span>
          <a href="#">View all</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="mb-md-4 mb-2">
    <div>
      <div class="">
        <ul class="list-group">
          <li class="py-md-4 font-weight-bold list-group-item justify-content-between align-items-center border-0">
            <span class="text-center">Liez vos réseaux sociaux</span>
          </li>
          <li class="py-md-4 list-group-item d-flex justify-content-between align-items-center border-0">
            <span class="rounded-circle user-avatar p-3 bg-primary"><i class="fab fa-facebook-f text-white"></i></span>
            <span class="rounded-circle user-avatar p-3 bg-primary"><i class="fab fa-twitter"></i></span>
            <span class="rounded-circle user-avatar p-3 bg-primary"><i class="fab fa-twitter"></i></span>
          </li>
        </ul>
      </div>
    </div>
  </div-->
</div>
