<!DOCTYPE html>
<html lang="en">

<head>
  <title>Académique &mdash; Site Web par Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style2.css">
  <script src="https://kit.fontawesome.com/1cf483120b.js" crossorigin="anonymous"></script>
<style>
  .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a {
    padding: 9px 20px;
    width: 500px;
    display: block;
  }
   .float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
  }

  .my-float{
    margin-top:16px;
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
            <a
              href="register.html"
              class="small btn btn-primary px-2 py-2 rounded-0"
              ><span class="icon-users"></span>S'inscrire</a
            >
          </div>
        </div>
      </div>
    </div>

    <div class="custom-breadcrumns border-bottom" style="margin-top:0">
      <div class="container">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{ route('courses') }}">Cours</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Cours</span>
      </div>
    </div>

    <div class="video-section">
        <div class="mejs__container-fullscreen container_">
            <div class="row">
              <div class="col-lg-8 col-12 info">
           <h1>Formation : {{ $formation->titre }}

<!-- Autres détails de la formation... -->
           </h1>
           <p>Présentation : {{ $formation->contenue }}</p>
           {{-- <div class="info-formateur">
            <div class="img-formateur"><img src="prof.jpeg" alt=""></div>
            <p class="name-formateur">Enseignant <br> <span> EMS AFRIQUE</span>
            </p>
           </div> --}}

              </div>
              <div class="col-lg-4 col-12 video">
                <div class="mx-auto">
                  <a href="Formationvideo/{{$formation->video}}" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                    <span class="play">
                      <span class="icon-play"></span>
                    </span>
                    <img src="Formationpic/{{$formation->image}}"  alt="Image" class="img-fluid rounded" style="max-width: 100%;" />
                  </a>
                </div>
              </div>
            </div>
        </div>
    </div>



    <div class="section-bg presentation style-1">
        <div class="container">
          <div class="roww">
            <h1>Présentation:
            </h1>

<p> {{ $formation->contenue }}
</p>
  <h1>Niveau <i class="fas fa-users"></i>
  </h1>
  <p>{{$formation->niveau}}</p>
     <h1>Prérequis <i class="fas fa-check-circle"></i>
    </h1>
    <p>{{$formation->prerequis}}</p>
<h1>Objectifs <i class="fas fa-bullseye"></i></h1>
{!! $formation->objectif !!}
  

  <h1> Programme de la formation <i class="fas fa-list-ul"></i></h1>
  {!! $formation->programme !!}


  <button class="btn btn-primary">Demander des renseignements</button>

  </div>

        </div>
      </div>

      <a href="https://api.whatsapp.com/send?phone=212606178638&text=Bienvenue%20dans%20notre%20formation." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>

        </a>

      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
              <p><a href="#">En savoir plus</a></p>
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
                <li><a href="#">Développement Web</a></li>
                <li><a href="#">Science des Données</a></li>
                <li><a href="#">Sécurité Informatique</a></li>
                <li><a href="#">Réseaux et Systèmes</a></li>
                <li><a href="#">Intelligence Artificielle</a></li>
                <li><a href="#">Génie Logiciel</a></li>
                </ul>
            </div>
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
