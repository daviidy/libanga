
@extends('layouts.menu')
@section('content')
      <section class="container-fluid" id="contentArtiste">
        <div class="row">
          <div class="col-md-12">
            <div class="p-5 d-md-flex justify-content-between align-items-center">
              <h2 class="h1 text-white font-weight-bold text-uppercase">Nos artistes</h2>
              <div class="w-50">
                <input class="form-control" id="courseSearch" type="text" placeholder="Search..">
              </div>
            </div>
          </div>
        </div>

        <div class="row py-4 mb-md-5" >

            @isset($artistes)
            @foreach ($artistes as $artiste)
                <div class="col-md-2 mt-3">

                    <a  @if (auth()->check())
                            href="{{route('show.artiste',$artiste->id)}}"
                        @else
                            href="#" data-toggle="modal" data-target="#modalLogin"
                        @endif class="text-decoration-none" >
                        <div class="p-3 box-shadow rounded ">
                            <div class="">
                            <img src="{{$artiste->image}}" alt="" class="img-fluid">
                            </div>
                            <div class="pt-2">
                            <h6 class="text-white font-weight-bold">{{$artiste->username}}</h6>
                            <p class="text-white">{{$artiste->username}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endisset
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
