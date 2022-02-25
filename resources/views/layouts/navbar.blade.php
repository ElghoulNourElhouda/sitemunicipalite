<nav class="navbar navbar-default navbar-fixed-top" style="background-color: dimgray">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="btn btn-link" href="{{ url('/') }}">
       <h5 class="text-default" style="color: #fff" ><b> @include('time.heure') </b> <!-- {{ config('app.name', 'Laravel') }} -->  </h5>
     </a>

   </div>


   <div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <b>
      <ul class="nav navbar-nav text text-primary">
        &nbsp;
        @if (!Auth::guest() && !Auth::User()->admin)
        <li><a href="{{ url('/') }}" style="color: #DAA520">Accueil</a></li>
        @endif

        @if (!Auth::guest() && Auth::User()->admin)
        <li><a href="{{ url('agents') }}" style="color: #DAA520">gérer agents</a></li>
        <li><a href="{{ url('condidats') }}" style="color: #DAA520">gérer condidats</a></li>
        <li><a href="{{ url('gererOffre') }}" style="color: #DAA520">gérer offres </a></li>
        @endif

        @if(!Auth::guest() && Auth::User()->agent)
        <li><a href="{{ url('nouveauOffre') }}" style="color: #DAA520"> ajouter offre </a></li>
        @endif

        @if(!Auth::guest() && Auth::User()->admin)
        <li><a href="{{ url('/manageAbout') }}" style="color: #DAA520">A propos</a></li>
        @else
        <li><a href="{{ url('/about') }}" style="color: #DAA520">A propos</a></li>
        @endif

        <li><a href="{{ url('/contacter') }}" style="color: #DAA520">Contacter</a></li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><a href="{{ url('/login') }}" style="color: #DAA520">Connecter</a></li>
        <li><a href="{{ url('/register') }}" style="color: #DAA520">Créer compte</a></li>
        @else

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #DAA520">
            <span class="glyphicon glyphicon-globe"></span>
            Notifications
            @if(count(auth()->user()->unreadnotifications))
            <span class="badge" style="background-color:red; color: white">{{ count(auth()->user()->unreadnotifications) }}</span>
            @endif
          </a>

          <ul class="dropdown-menu" role="menu">
            <li>
              @forelse(auth()->user()->unreadnotifications as $notification)
              @include('notifications.'.class_basename($notification->type))
              @empty
              <a href="#"> No unread Notifications </a>
              @endforelse
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #DAA520">
            <span class="glyphicon glyphicon-user "></span>
            {{ Auth::user()->username }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/profile') }}">Modifier Profile</a></li>
            <li><a href="{{ url('/password') }}">Changer mot de passe</a></li>
            <li class="divider"></li>
            <li>
              <a href="{{ url('/logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Déconnexion
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
      @endif
    </ul>
  </b>
</div>
</div>
</nav>
