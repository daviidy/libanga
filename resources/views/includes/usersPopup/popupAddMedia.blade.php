<div  class="modal fade" id="modalAddMedia" tabindex="-1" aria-labelledby="modalAddMediaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <span class="float-right position-absolute rounded-circle svg-delete1 close" data-dismiss="modal" aria-label="Close">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
      </span>
      <div class=" rounded-lg popup-shadow">
        <div class="" style="border-radius: 7px; background:#e7cbc2">
          <div class="position-relative p-md-3 p-2" style="bottom:30px">
            <div class="mx-auto text-center">
              <img src="https://process.filestackapi.com/AtM7HNKzQZ6u2HxwJF1Jiz/compress/quality=value:90/0tTy4z3lTbCkw18ehjQ8" alt="" class="img-fluid rounded-circle avatar-login-img">
            </div>
              <div class="">
                <p class="mx-auto mb-0 text-center h4 pt-3">Ajouter un extrait du service</p>
              </div>
              <div class="mt-md-4 my-4">
                  <form id="add-media" class="p-md-4 text-center" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                      <input type="file" required class="form-control-file bg-white p-1" name="media" id="exampleFormControlFile1" accept="audio/mp3">
                    </div>
                    <input type="hidden" name="purchase_id">
                    <input type="hidden" name="service_id">
                    <input type="hidden" name="status">
                    <input type="hidden" name="user_id">
                    <input type="hidden" name="purchase_state">
                    <button type="submit" class=" text-center text-decoration-none box-hover h-auto rounded-pill py-3 px-md-5 px-4 text-white btn-hs btn-shadow border border-white">Ajouter un extrait</button>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
