<!DOCTYPE html>
<html lang="en">

<head>
  <title>Académique &mdash; Site Web par Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
  <style>
    #loading {
        position: relative;
        top: 40%;
        left: 30%;

    }

</style>


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-facebook mr-2"></span></a>
            <a href="#" class="small mr-3"><span class="icon-instagram mr-2"></span></a>
            <a href="#" class="small mr-3"><span class="icon-twitter mr-2"></span></a>
            <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> 10 20 123 456</a>
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span>Contact</a>
          </div>
          <div class="col-lg-3 text-right">
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="small btn btn-primary px-2 py-2 rounded-0">
                        <span class="icon-lock"></span> Déconnexion
                    </button>
                </form>
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
    <x-header :categ="$datas"/>

    <div class="custom-breadcrumns border-bottom" style="margin-top: 120px;">
      <div class="container">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{ route('courses') }}">Cours</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Cours</span>
      </div>
    </div>

    <div class="filter-section">
        <div class="mejs__container-fullscreen">
        <div class="row">
            <div class="col-lg-3 col-12 filter">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                            <div class="ms-2 c-details">
                                <h5 class="mb-0">Catégorie :</h5>
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                      <form action="">
                        @foreach($datas as $categ)
                        <input type="checkbox" id="categ" name="domaine" value={{$categ['id']}}> {{$categ['nom']}}
                        <br>
                        @endforeach

                        <div class="btn-container">
                            <button id="ajaxbuton" class="btn btn-primary">Réinitialiser tout</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

              <div id="loading" style="display: none !important;">
                <img src="Animation - 1711828043942.gif" alt="Chargement..." />
            </div>
            <div id="listeform" class="col-lg-9 col-12 cards">
              @foreach ($formations as $form)
                <div class="course-1-item">
                  <figure class="thumnail">
                    <a href="{{ route('course', ['id' => Crypt::encrypt($form->id)]) }}">
                        <img src="Formationpic/{{$form->image}}" alt="Ingénierie des ressources en eau" class="img-fluid">
                    </a>
                    <div class="price">{{$form->prix}}€</div>
                    <div class="category">
                      <h3>{{$form->titre}}</h3>
                    </div>
                  </figure>
                  <div class="course-1-content pb-4">
                    <div class="rating text-center mb-3">
                      @php
                      $i=$form->niveau_etoile;

                      @endphp
                      @for($j=1;$j<=5;$j++)
                      @if($i!=0)
                      <span class="icon-star2 text-warning"></span>
                      @php
                      $i--;
                      @endphp
                      @endif
                      @endfor

                    </div>
                    <p class="desc mb-4">
                      {{$form->contenue}}
                    </p>
                    <p>
                        <a href="{{ route('course', ['id' => Crypt::encrypt($form->id)]) }}" class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a>

                    </p>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>

    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-mortarboard"></span>
              <h3>Notre Philosophie

              </h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-school-material"></span>
              <h3>Principe Académique</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                Dolore, amet reprehenderit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <span class="icon flaticon-library"></span>
              <h3>Clé du Succès</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                Dolore, amet reprehenderit.</p>
            </div>
          </div>
        </div>
      </div>


    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
            <p><a href="#">Lire Toutes les Actualités</a></p>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Nos Certifications</span></h3>
            <ul class="list-unstyled">
              <li><a href="#">Finance</a></li>
              <li><a href="#">Management</a></li>
              <li><a href="#">Hôtellerie</a></li>
              <li><a href="#">Génie Civil</a></li>
              <li><a href="#">Santé</a></li>
              <li><a href="#">Informatique</a></li>
            </ul>
          </div>

          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Contact</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Centre d'aide</a></li>
                <li><a href="#">Communauté de support</a></li>
                <li><a href="#">Presse</a></li>
                <li><a href="#">Partagez votre histoire</a></li>
                <li><a href="#">Nos Partenaires</a></li>

              </ul>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Droits d'auteur
  &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est créé avec
                    <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/ajaxjs/testajax.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>
  <script src="js/header.js"></script>




  <script src="js/main.js"></script>

</body>

</html>
