<!-- Modal-->
<div  class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <span class="float-right position-absolute rounded-circle svg-delete close" data-dismiss="modal" aria-label="Close"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg></span>
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-transparent border-0">
        <div class=" rounded-lg popup-shadow">
          <div class="" style="border-radius: 7px 7px 0 0; background:#e7cbc2">
            <div class="position-relative text-center p-3" style="bottom:30px">
              <div class="mx-auto">
                <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" alt="" class="img-fluid rounded-circle avatar-login-img">
              </div>
                <div class="">
                  <p class="w-75 mx-auto mb-0 text-center h4 pt-3">Modifiez les infos utilisateurs</p>

                </div>
            </div>

          </div>
          <form method="POST" enctype="multipart/form-data" id="edit-user">
              @csrf
              {{ method_field('patch') }}
              <div class="p-md-4 p-3 bg-white">
              <div class="form-group">
                <label for="file">Photo de profil</label>
                <input type="file" name="image" class="form-control" id="file" aria-describedby="fileHelp">
              </div>
              <div class="form-group type">
                <label for="exampleFormControlSelect1">Role</label>
                <select class="form-control" id="type" name="type" required="required">
                  <option value="">Selectionner le role de l'utilisateur</option>
                  <option value="admin">Admin</option>
                  <option value="artiste">Artiste</option>
                  <option value="default">Default</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" name="user_description" id="user_description" rows="3"></textarea>
              </div>

            </div>
            <input type="hidden" name="user_id">
            <button type="submit" class="btn btn-lg btn-block p-md-4 p-3 text-center text-white mb-0 text-uppercase d-flex justify-content-center align-items-center"style="border-radius: 0 0 7px 7px;background: #6f23ff;">
              Modifier
              <span>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
              </span>
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
