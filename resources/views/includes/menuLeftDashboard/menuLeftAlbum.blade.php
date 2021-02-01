<div class="col-3 d-none side-menu d-md-block bg-main">
    <div class="bg-white mt-5 p-3 mb-4">
      <div>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0">
            <img class="rounded-circle img-fluid user-avatar" src="{{(auth()->user()->image) ? asset(auth()->user()->image) : asset("/assets/images/users/avatar_default.png")}}" alt="User">
            <span>{{auth()->user()->username}}</span>
          </li>
        </ul>
      </div>
      <hr>
      <div>
        <div>
          <ul class="list-group">
            <li><a href="{{ route('dashboard')}}" class="list-group-item d-flex justify-content-between align-items-center border-0">Tableau de bord</a></li>
            <li><a onclick="showEditModal({{auth()->user()->id}})" class="list-group-item d-flex justify-content-between align-items-center border-0" >Modifier mon profil</a></li>
            <li><a href="{{route('chansons.index')}}" class="list-group-item d-flex justify-content-between align-items-center border-0">Mes Chansons</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
