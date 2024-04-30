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
    .card {
       margin-top: 140px ;
       margin-bottom: 30px ;
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
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="small btn btn-primary px-2 py-2 rounded-0">
                    <span class="icon-lock"></span> Déconnexion
                </button>
            </form>
        </div>

        </div>
      </div>
    </div>
    <x-header :categ="$datas"/>



    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        @if($membre && $membre->image)
                          <img src="{{ asset('storage/picMembres/' . $membre->image) }}" class="rounded-circle" style="width: 100px; height: 100px;" alt="Image de profil">
                        @else
                          <div class="bg-secondary rounded-circle" style="width: 100px; height: 100px;"></div>
                        @endif
                      </div>
                    <div class="card-body">
                        <h5 class="card-title">Informations de l'utilisateur</h5>
                        <p class="card-text" style="margin-top: 10px;">Email: {{ $user->email }}</p>
                        <p class="card-text">Numéro de téléphone: {{ $user->num_tel }}</p>
                        @if($membre)
                            <p class="card-text">Nom: {{ $membre->nom }}</p>
                            <p class="card-text">Prénom: {{ $membre->prenom }}</p>
                        @else
                            <p class="card-text">Membre non défini</p>
                        @endif
                    </div>
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
