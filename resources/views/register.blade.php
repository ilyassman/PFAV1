<!DOCTYPE html>
<html lang="en">

<head>
  <title>Academics &mdash; Website by Colorlib</title>
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
    .formulaire-card {
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Ajoute une ombre */
    border-radius: 10px; /* Arrondit les coins */
    padding: 20px; /* Ajoute un espace intérieur */
    background-color: #fff; /* Couleur de fond */
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
            <a href="{{ route('login') }}" class="small btn btn-primary px-2 py-2 rounded-0"
              ><span class="icon-unlock-alt"></span>Connexion</a
            >
            <a href="{{ route('register') }}" class="small btn btn-primary px-2 py-2 rounded-0">
              <span class="icon-users"></span>S'inscrire
          </a>
          </div>
        </div>
      </div>
    </div>
    <x-header :categ="$datas"/>

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
      </div>
    </div>


    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Ajoutez ceci pour protéger votre formulaire contre les attaques CSRF -->
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 formulaire-card">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" id="prenom" name="prenom" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="tel">Numéro de téléphone</label>
                                <input type="tel" id="tel" name="tel" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control-file">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg px-5">Inscrire</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




    <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
              <p><a href="#">Learn More</a></p>
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
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Support Community</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Share Your Story</a></li>
                    <li><a href="#">Our Supporters</a></li>
                </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="copyright">
                  <p>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
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




    <script src="js/main.js"></script>

  </body>

  </html>
