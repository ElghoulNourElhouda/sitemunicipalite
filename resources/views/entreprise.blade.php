@extends('EspaceEntreprise.layout')

@section('content')

<!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <a href="{{ url('/listOffre') }}">
                <h4>Offres</h4>
                <h2>{{ App\Article::where('users_id',auth()->id())->count() }}</h2>
              </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Condidats</h4>
                <h2>{{ App\User::where('admin','0')->where('agent','0')->count() }}</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Nos Offres</h4>
                <h2></h2>
              </div>
            </div>
          </div>
        </div>

        <hr>
        <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Offres</h4>
                <h2>{{ App\Article::All()->count() }}</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Condidats</h4>
                <h2>{{ App\User::where('admin','0')->where('agent','0')->count() }}</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                <img src="https://vignette.wikia.nocookie.net/nationstates/images/2/29/WS_Logo.png/revision/latest?cb=20080507063620">
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Nos Offres</h4>
                <h2>{{ App\Article::where('users_id',auth()->id())->count() }}</h2>
              </div>
            </div>
          </div>
        </div>

@endsection