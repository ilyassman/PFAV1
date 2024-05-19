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
      transform: translateX(-50%);
    }
    .support {
      margin-top: 70px;
      display: flex ;
      flex-direction: column;
      align-items: center
    }
    .comment {
      padding: 30px 0;
      display: flex;
      justify-content: center;
      align-content: center;
    }
    .comment .card {
      background-color: rgb(255, 255, 255);
      border: none;
      border-radius: 20px;
      width: 80%;
      padding: 10px;
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    }
    .stars_container {
      display: flex;
      justify-content: center;
      align-items: center;
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
    .card-container{
        display: flex ;
        flex-wrap: wrap ;
        justify-content: space-between ;
        width: 70%;
    }
    .card{
        width : 300px;
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

    <x-header :categ="$datas"/>

    <div class="custom-breadcrumbs border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Formation membres</span>
      </div>
    </div>

    <section class="support-cours bg-light shadow rounded-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center support">
            <h2 class="title mt-4 mx-auto" style="display: inline-block;">Support de cours</h2>
            <p class="mt-4">Supports de cours disponibles :</p>
            @if (count($supports) == 0)
              <h2 class="mt-2 mx-auto" style="font-size:15px;color:red;">Pas de support pour le moment</h2>
            @else
            <div class="card-container">
                @foreach($supports as $support)
@if($support->date_fun != date('Y-m-d'))
            <div class="card mb-3">
              <div class="card-body">
                
                <h5 class="card-title">{{$support->titre}}</h5>
                @php
                $file_path = "Support/{$support->fichier}";
                $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                @endphp
                @if($extension == 'pdf')
                <button class="btn btn-primary" onclick="showPdfModal('{{$file_path}}')">Voir PDF</button>
                <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="pdfModalLabel">{{$support->titre}}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <embed id="pdfEmbed" src="" type="application/pdf" width="100%" height="600px" />
                          </div>
                      </div>
                  </div>
              </div>
              
                @elseif(in_array($extension, ['mp4', 'webm', 'ogg']))
                <button class="btn btn-primary" onclick="showVideo('{{$file_path}}')">Voir Vidéo</button>
                @else
                <a href="{{$file_path}}" class="btn btn-primary" target="_blank">Télécharger</a>
                @endif
              </div>
            </div>
            @else
            <h2 class="mt-2 mx-auto" style="font-size:15px;color:red;">Pas de support pour le moment</h2>
            @break
            @endif

            @endforeach</div>

            @endif
          </div>

          @if(Auth::user()->type == 2)
            @if (isset($support->date_fun) && $support->date_fun == date('Y-m-d'))
              <div class="col-md-12 text-center support">
                <h2 class="title mt-4 mx-auto" style="display: inline-block;">Certificat</h2>
                <a href="{{ route('Certifgenerat', ['id' => $formationId]) }}">Télécharger votre certificat</a>
              </div>
            @endif
          @endif
        </div>

        @if(Auth::user()->type == 2)
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
                        @for($i = 1; $i <= $vote->niveau_etoile; $i++)
                          <i class="fa-solid fa-star active"></i>
                        @endfor
                        @php
                          $nbr = 5 - $vote->niveau_etoile;
                          for($i = 1; $i <= $nbr; $i++)
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
        @else
          <div class="col-md-12 text-center support" style="margin-bottom: 30px;">
            <h2 class="title mt-4 mx-auto" style="display: inline-block;">Voici le lien vers la session :</h2>
            <br>
            <a href="{{$session->url}}">{{$session->url}}</a>
          </div>
        @endif
      </div>
    </section>

    @if(isset($datas))
      <x-footer :datas="$datas" />
    @endif
  </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/>
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
  <script src="js/ajaxjs/sendcomment.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/main.js"></script>
  <script>
     function showPdfModal(pdfPath) {
        var pdfEmbed = document.getElementById('pdfEmbed');
        pdfEmbed.setAttribute('src', pdfPath+"#toolbar=0");
        $('#pdfModal').modal('show');
    }

    function showVideo(videoPath) {
      window.open(videoPath, '_blank');
    }
  </script>
</body>
</html>