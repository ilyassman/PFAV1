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

/* CSS pour l'icône d'œil */
.fa-eye:before {
    content: "\f06e"; /* Icône d'œil ouvert */
}

.fa-eye-slash:before {
    content: "\f070"; /* Icône d'œil fermé */
}

/* Positionnement de l'icône d'œil */
.password-container {
    position: relative;
}

.fa-solid {
    font-weight: 900;
}

.fa-solid {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

.verification-code {
    display: flex;
    justify-content: center;
}

input[type="text"] {
    width: 50px;
    height: 50px;
    text-align: center;
    font-size: 20px;
    margin: 0 5px;
    border-radius: 10px;
    border : none ;
    background: rgb(217, 217, 217);
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




    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Réinitialiser le mot de passe</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-5 formulaire-card" style="padding:50px">
                    <h2 class="text-center" style="font-size: 25px;">Entrer le code reçu par email</h2>
                    <form method="POST" action="{{route('changepass')}}">
                        @csrf
                        <div class="verification-code d-flex justify-content-center mt-4">
                            <input value="{{$email}}" name="email" type="text" style="display: none">
                            <input value="{{$code}}" name="codeemail" type="text" style="display: none">
                            <input name="code[]" type="text" maxlength="1" size="1" onkeyup="focusNext(this)" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
<input name="code[]" type="text" maxlength="1" size="1" onkeyup="focusNext(this)" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
<input name="code[]" type="text" maxlength="1" size="1" onkeyup="focusNext(this)" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
<input name="code[]" type="text" maxlength="1" size="1" onkeyup="focusNext(this)" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
<input name="code[]" type="text" maxlength="1" size="1" onkeyup="focusNext(this)" oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                        </div>
                        @if(isset($error))
                            
                       
                                    <h6 style="text-align: center" class="text-danger">{{ $error }}</h6>
                                @endif
                        
                        <button type="submit" class="btn btn-primary btn-block mt-4">Envoyer</button>

                    </form>
                </div>
            </div>
        </div>
    </div>








    <x-footer :datas="$datas" />


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
  <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
  var passwordField = document.getElementById('password');
  var eyeIcon = document.getElementById('togglePassword');

  if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
  } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
  }
});


function focusNext(current) {
  if (current.value.length === current.maxLength) {
    var next = current.nextElementSibling;
    if (next !== null) {
      next.focus();
    }
  }
}


  </script>

</body>

</html>