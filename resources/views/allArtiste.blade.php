
@extends('layouts.menu')
@section('content')
      <section class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Trouver nos artistes</h1>
          </div>
        </div>
      </section>
      <section class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="p-5 d-md-flex justify-content-between align-items-center">
              <h2 class="h1 text-white font-weight-bold text-uppercase">Nos artistes</h2>
              <div class="w-50">
                <input class="form-control" id="courseSearch" type="text" placeholder="Filter par artiste">
              </div>
            </div>
          </div>
        </div>

        <div class="row py-4 mb-md-5" id="contentArtiste ">
          <div class="col-md-6">
            <div class="bg-white rounded-lg p-3 hover-bloc">
              <div class="d-flex p-2">
                <img src="http://127.0.0.1:8000/assets/images/abort.jpg" alt="" width="150" height="150" class="img-fluid rounded-lg">
                <div class="d-flex flex-column p-3">
                  <span class="p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    Arafate
                  </span>
                  <span class="p-1">
                    Artiste chanteure
                  </span>
                  <span >
                  <span class="p-1">
                    Pays
                  </span>

                </div>
              </div>
              <div class="p-2">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
              </div>
            </div>
          </div>

        </div>

      </section>

    </div>

    <script>

        $(document).ready(function(){
          $("#courseSearch").keyup(function() {

            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(),
              count = 0;

            // Loop through the comment list
            $('#contentArtiste .filter').each(function() {


              // If the list item does not contain the text phrase fade it out
              if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();

                // Show the list item if the phrase matches and increase the count by 1
              } else {
                $(this).show();
                count++;
              }

            });

          });

        });
    </script>


    @endsection
