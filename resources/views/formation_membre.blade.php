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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");


.title {
        position: relative;
        display: inline-block;
    }
    .title::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: -5px;
        width: 50px;
        height: 2px;
        background-color: green;
        transform: translateX(-50%); }
.support {
    margin-top: 70px;
}

.comment{
    padding: 30px 0;
    display: flex ;
    justify-content: center;
    align-content: center;
}

.comment .card {
    background-color: rgb(255, 255, 255);
    border : none ;
    border-radius: 20px;
    width: 80% ;
    padding: 10px ;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);

}
.stars_container{
    display: flex ;
    justify-content: center ;
    align-items: center ;
}

.stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.stars i {
  color: #e6e6e6;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.stars i.active {
  color: #ff9c1a;
}
.annuler {
    background-color: rgb(230, 93, 93);
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.ajouter {
    background-color: green;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            <div class="connect_container" style="display: flex;justify-content: space-between;width:210px;">
                <a href="{{ route('profile') }}" class="small btn btn-primary px-2 py-2 rounded-0">
                   <span class="icon-user"></span> Profil
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST">
                   @csrf
                   <button type="submit" class="small btn btn-primary px-2 py-2 rounded-0">
                       <span class="icon-lock"></span> Déconnexion
                   </button>
               </form></div>

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




    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Formation membres</span>
      </div>
    </div>

    <section class="support-cours bg-light shadow rounded-3">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 text-center support">
                    <h2 class="title mt-4 mx-auto" style="display: inline-block;">Support de cours</h2>
                    <p class="mt-4">Téléchargez le support de cours au format PDF:</p>
                    <a href="Support/coursIHM.pdf" download class="btn btn-primary rounded-pill mb-3 px-4">
                        <i class="fa-solid fa-download"></i> Télécharger le support de cours
                    </a>
                    <p>Ou voir le cours en ligne ici:</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="Support/coursIHM.pdf" class="embed-responsive-item" title="Support de cours"></iframe>
                    </div>
                </div>
            </div>
        </div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 text-center support">
                <h2 class="title mt-4 mx-auto" style="display: inline-block;">Commentaires</h2>
              </div>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-6 comment">
                <div class="card">
                  <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div>
                      <img src="Membrespic/{{$membre->image}}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
                      <span class="ms-2 ml-2">{{$membre->nom}} {{$membre->prenom}}</span>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="text-center stars_container">
                      <div class="stars">
                        @if($vote)
                        @for($i=1;$i<=$vote->niveau_etoile;$i++)
                        <i class="fa-solid fa-star active"></i>
                        @endfor
                        @php
                        $nbr=5-$vote->niveau_etoile;
                        for($i=1;$i<=$nbr;$i++)
                        echo '<i class="fa-solid fa-star"></i>';
                        
                        @endphp
                        @else
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        @endif

                      </div>
                    </div>
                    <textarea id="commentin" class="form-control mt-3" placeholder="What is your view?"></textarea>
                  </div>
                  <div class="card-footer d-flex bg-white justify-content-between align-items-center">
                    <button onclick="sendcomment()" type="button" class="btn ajouter" data-mdb-ripple-init>Ajouter <i class="fa-solid fa-arrow-right" style="font-size: 13px"></i></button>
                  </div>
                </div>
              </div>
            </div>
    </section>









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
  <script src="js/ajaxjs/sendcomment.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="js/main.js"></script>
 

</body>

</html>
