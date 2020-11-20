
<!-- Modal-->
<div  class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class=" rounded-lg">
        <div class="bg-success" style="border-radius: 10px 10px 0 0;">
          <div class="position-relative text-center p-3" style="bottom:30px">
            <div class="mx-auto">
              <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" alt="" class="img-fluid rounded-circle avatar-login-img">
            </div>
            <span class="float-right position-relative rounded-circle svg-delete close" data-dismiss="modal" aria-label="Close"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg></span>
          </div>
        </div>
        <form class="">
          <div class="bg-white pt-md-2">
            <p class="w-75 mx-auto bg-white mb-0 text-center h5 text-uppercase py-3 font-weight-bold">Connectez-vous</p>
          </div>
          <div class="p-md-4 p-3 bg-white">
            <div class="form-group input-group-lg">
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
            </div>
            <div class="form-group input-group-lg">
              <input type="password" class="form-control" id="exampleInputPassword" placeholder="mot de pass">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
            </div>
            <p>Etre vous inscrit? <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalRegister">Inscrivez-vous</a> </p>
          </div>
          <div class="bg-primary p-md-4 p-3 text-center" style="border-radius: 0 0 10px 10px;">
            <p class="text-white mb-0">Se connecter
              <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg></span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('includes.popupRegister')
