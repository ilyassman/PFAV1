<!DOCTYPE html>
<html lang="en">

<head>
  <title>Académique &mdash; Site Web par Colorlib</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet" />
  <link rel="stylesheet" href="fonts/icomoon/style.css" />

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />

  <link rel="stylesheet" href="css/jquery.fancybox.min.css" />

  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

  <link rel="stylesheet" href="css/aos.css" />
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="css/style.css" />
  <style>
    .section-bg.style-1 {
      background-size: cover;
      background-position: center;
      padding: 80px 0;
      text-align: center;
      color: #fff;
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .card-header {
      background: rgba(255, 255, 255, 0.2);
      padding: 10px;
      border-radius: 10px 10px 0 0;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .card-stat {
      background: rgba(255, 255, 255, 0.2);
      border-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    .card-stat-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-stat-value {
      font-size: 24px;
      font-weight: bold;
    }

    .course-image {
      width: 200px;
      /* Définit une largeur fixe pour l'image */
      height: 200px;
      /* Définit une hauteur fixe pour l'image */
      object-fit: cover;
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

    
    <x-header :categ="$datas" />
    {{-- <div id="emplacement-entete"></div> --}}

    <div class="hero-slide owl-carousel site-blocks-cover">
      <div class="intro-section" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1>Université Académique</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="intro-section" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1>Vous pouvez apprendre n'importe quoi</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div></div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Académie</span>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-mortarboard text-white"></span>
              </div>
              <div class="feature-1-content">
                <h2>Personnaliser l'apprentissage</h2>
                <p>
                  Nous offrons des parcours d'apprentissage sur mesure, permettant à chaque étudiant de progresser à son propre rythme et d'atteindre ses objectifs académiques.                </p>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-school-material text-white"></span>
              </div>
              <div class="feature-1-content">
                <h2>Cours de confiance</h2>
                <p>
                  Nos cours sont créés par des experts, garantissant un contenu de haute qualité et actualisé, assurant ainsi une préparation rigoureuse et fiable.
                </p>
               
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="feature-1 border">
              <div class="icon-wrapper bg-primary">
                <span class="flaticon-library text-white"></span>
              </div>
              <div class="feature-1-content">
                <h2>Outils pour les étudiants</h2>
                <p>
                  Nous fournissons une variété d'outils numériques innovants pour enrichir l'expérience d'apprentissage et encourager l'engagement et la collaboration des étudiants.
                </p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title-underline mb-3">
              <span>Cours populaires</span>
            </h2>
            <p>Explorez nos cours les plus populaires dès aujourd'hui !</p>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="owl-slide-3 owl-carousel">
              @foreach ($formations as $form)
              <div class="course-1-item">
                <figure class="thumnail">
                  <a href="{{ route('course', ['id' =>Crypt::encrypt($form->id)]) }}">
                    <img src="Formationpic/{{$form->image}}" alt="Ingénierie des ressources en eau"
                      class="img-fluid course-image">
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
                    @for($j=1;$j<=5;$j++) @if($i!=0) <span class="icon-star2 text-warning"></span>
                      @php
                      $i--;
                      @endphp
                      @endif
                      @endfor

                  </div>
                  <p class="desc mb-4">
                    <?php
                      $content = $form->contenue;
                      $wordCount = str_word_count($content);

                      // Si le contenu dépasse 20 mots, afficher uniquement les 20 premiers mots et un lien "Lire la suite"
                      if ($wordCount > 20) {
                          $shortContent = implode(' ', array_slice(explode(' ', $content), 0, 20));
                          echo $shortContent . ' <a href="' . route('course', ['id' => Crypt::encrypt($form->id)]) . '" class="read-more">Lire la suite</a>';
                      } else {
                          echo $content;
                      }
                      ?>
                  </p>
                  <p>

                    <a href="{{ route('course', ['id' => Crypt::encrypt($form->id)]) }}"
                      class="btn btn-primary rounded-0 px-4">S'inscrire à ce cours</a>

                  </p>
                </div>

              </div>
              @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span>À Propos de notre Université</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead">
             @if(!empty($ecole->propos)) 
            {{$ecole->propos}}
            @else
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Voluptatibus assumenda omnis tempora ullam alias amet eveniet
            voluptas, incidunt quasi aut officiis porro ad, expedita saepe
            necessitatibus rem debitis architecto dolore? Nam omnis sapiente
            placeat blanditiis voluptas dignissimos, itaque fugit a
            laudantium adipisci dolorem enim ipsum cum molestias? Quod quae
            molestias modi fugiat quisquam. Eligendi recusandae officiis
            debitis quas beatae aliquam?
            @endif
            </p>
           
           
          </div>
        </div>
      </div>
    </div>

    <!-- // 05 - Block -->
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4">
            <h2 class="section-title-underline">
              <span>Formateurs</span>
            </h2>
          </div>
        </div>

        <div class="owl-slide owl-carousel">
          @foreach ($formateurs as $form)
          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="/Formateurspic/{{$form->image}}" alt="Image" class="img-fluid mr-3" />
              <div>
                <h3>{{$form->nom . " ".$form->prenom}}</h3>
              </div>
            </div>
            <div>
              <p>
                {{$form->description}}
              </p>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>

    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Statistiques</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-4 mb-3">
                    <div class="card-stat">
                      <h4 class="card-stat-title">Étudiants</h4>
                      <div class="card-stat-value">
                        <span id="incrementedNumber2">0</span>+
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-4 mb-3">
                    <div class="card-stat">
                      <h4 class="card-stat-title">Formations</h4>
                      <div class="card-stat-value">
                        <span id="incrementedNumber">0</span>+
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-4 mb-3">
                    <div class="card-stat">
                      <h4 class="card-stat-title">Formateurs</h4>
                      <div class="card-stat-value">
                        <span id="incrementedNumber1">0</span>+
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="news-updates">
      <div class="container">
        <div class="text-center">
          <h2 class="section-title-underline mb-3">
            <span>Vidéos de notre organisation</span>
          </h2>
          <div class="mx-auto">
            <a href="vid.mp4" class="video-1 mb-4" data-fancybox="" data-ratio="2">
              <span class="play">
                <span class="icon-play"></span>
              </span>
              <img src="formation.jpg" alt="Image" class="img-fluid rounded" style="max-width: 100%" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section ftco-subscribe-1" style="background-image: url('images/bg_1.jpg')">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <h2>Abonnez-vous!</h2>
            <p>
              Far far away, behind the word mountains, far from the countries
              Vokalia and Consonantia,
            </p>
          </div>
          <div class="col-lg-5">
            <form action="" class="d-flex">
              <input type="text" class="rounded form-control mr-2 py-3" placeholder="Enter your email" />
              <button class="btn btn-primary rounded py-3 px-4" type="submit">
                Envoyer
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <x-footer :datas="$datas" />
  </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#51be78" />
    </svg>
  </div>

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
  <script src="js/incri.js"></script>
</body>

</html>