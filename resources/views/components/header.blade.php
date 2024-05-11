@props(['categ'])
@php
$ecole = App\Models\Ecole::first();

@endphp
<div class="py-2 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 d-none d-lg-block">
        @if (!empty($ecole->facebook))
        <a href="{{ $ecole->facebook }}" class="small mr-3"><span class="icon-facebook mr-2"></span></a>
        @endif
        @if (!empty($ecole->twitter))
        <a href="{{ $ecole->twitter }}" class="small mr-3"><span class="icon-twitter mr-2"></span></a>
        @endif
        @if (!empty($ecole->instagram))
        <a href="{{ $ecole->instagram }}" class="small mr-3"><span class="icon-instagram mr-2"></span></a>
        @endif
        @if (!empty($ecole->numero_whatsapp))
        <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> {{ $ecole->numero_whatsapp }}</a>
        @endif
        @if (!empty($ecole->email))
        <a href="mailto:{{ $ecole->email }}" class="small mr-3"><span
            class="icon-envelope-o mr-2"></span>Contact</a>

        @endif
      </div>
      <div class="col-lg-3 text-right">
        @auth
        <div class="connect_container"
          style="display: flex; justify-content: space-between; align-items: center; width: 210px;">

          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary px-2 py-2 rounded-0">
              <span class="icon-lock"></span> Déconnexion
            </button>
          </form>
          <a href="{{ route('profile') }}" style="width: 50px; height: 50px; overflow: hidden;">
            @php
            $user = Auth::id();
            $membre = App\Models\Membre::where('iduser', $user)->first();
            @endphp
            <img src="Membrespic/{{ $membre->image}}" alt="Profil"
              style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
          </a>
        </div>
        @else
        <a href="{{ route('login') }}" class="small btn btn-primary px-2 py-2 rounded-0">
          <span class="icon-unlock-alt"></span> Connexion
        </a>
        <a href="{{ route('register') }}" class="small btn btn-primary px-2 py-2 rounded-0">
          <span class="icon-users"></span> S'inscrire
        </a>
        @endauth
      </div>

    </div>
  </div>
</div>
<div>
  @if(isset($categ))
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
     
        <div class="container">
          <div class="d-flex align-items-center">
            <div class="site-logo">
              <a href="{{ route('home') }}" class="d-block">
                @if(!empty($ecole->logo))
                <img src="/Ecolelogo/{{ $ecole->logo }}" alt="Image" class="img-fluid" style="max-width: 140px; height: auto;"  />
                @endif

              </a>
            </div>
            <div class="mr-auto">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li class="active">
                    <a href="{{ route('home') }}" class="nav-link text-left"><span class="icon-home mr-2"></span></a>
                  </li>
                  
                  @foreach($categ as $data)
                  <li class="has-children">
                    <a href="#" class="nav-link text-left">{{$data['nom']}}</a>

                    <ul class="dropdown" >
                      @if(count($data['formation'])>0)
                      @foreach($data['formation'] as $formation)
                      <li>
                        <a href="{{ route('course', ['id' => Crypt::encrypt($formation->id)]) }}" class="nav-link text-left">{{$formation['titre']}}</a>
                      </li>
                    @endforeach
                      @else
                      <li><a>aucune formation</a></li>
                      @endif
                    </ul>

                  </li>

                  @endforeach
                  <li>
                    <a href="{{ route('courses') }}" class="nav-link text-left">Certificats</a>
                  </li>
                </ul>                                                                                                                                                                                                                                                                                          </ul>
              </nav>
            </div>
            @endif
            <div class="ml-auto">
              <div class="social-wrap">
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                  class="icon-menu h3"></span></a>
              </div>
            </div>

          </div>
        </div>

        </header>
</div>
