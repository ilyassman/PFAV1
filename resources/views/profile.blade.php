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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}


.eye-icon {
    position: absolute;
    right: 20px;
    top : 91%;
    transform: translateY(-50%);
    cursor: pointer;
}

.eye-icon.hide-password::before {
    content: "\f070"; /* Icône d'œil fermé */
}

.eye-icon.show-password::before {
    content: "\f06e"; /* Icône d'œil ouvert */
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
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        @if($membre && $membre->image)
                        <img src="{{ asset('Membrespic/' . $membre->image) }}" alt="Admin" class="rounded-circle" width="150" height="150">
                        @else
                        <div class="bg-secondary rounded-circle" style="width: 100px; height: 100px;"></div>
                        @endif
                        <div class="mt-3">
                        @if($membre)
                          <h4>{{ $membre->nom }} {{ $membre->prenom }}</h4>
                          <p class="text-muted font-size-sm">{{ $user->email }}</p>
                          @else
                          <p class="card-text">Membre non défini</p>
                      @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                    <div class="card-footer">
                      <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#formationModal">
                        <i class="fas fa-graduation-cap"></i> Voir vos formations
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Nom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $membre->nom }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Prénom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{ $membre->prenom }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->email }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Numéro de téléphone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->num_tel }}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
    data-nom="{{ $membre->nom }}" data-prenom="{{ $membre->prenom }}"
    data-email="{{ $user->email }}" data-num-tel="{{ $user->num_tel }}">
    <i class="fa-solid fa-pen-to-square"></i> Edit
</button>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier les informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" enctype="multipart/form-data"> <!-- Ajoute enctype="multipart/form-data" pour envoyer des fichiers -->
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $membre->nom }}">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $membre->prenom }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="num_tel">Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="num_tel" name="num_tel" value="{{ $user->num_tel }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image de profil</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="password" name="password">
                            <i class="eye-icon fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <!-- Ajoute ici un bouton de soumission du formulaire pour enregistrer les modifications -->
                <button type="submit" class="btn btn-primary" form="editForm">Enregistrer</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formationModal" tabindex="-1" role="dialog" aria-labelledby="formationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formationModalLabel">Formations inscrites</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach($formations as $formation)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $formation->titre }}</span>
                            <a href="{{ route('formation_membre', ['id' =>Crypt::encrypt($formation->id)]) }}" class="btn btn-primary">Voir</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
  <script>
    // JavaScript pour pré-remplir le formulaire de la modal avec les informations de l'utilisateur
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        // Extraction des informations de l'utilisateur depuis les éléments HTML (ex: data-* attributes)
        var nom = button.data('nom')
        var prenom = button.data('prenom')
        var email = button.data('email')
        var num_tel = button.data('num-tel')
        // Pré-remplissage des champs du formulaire de la modal
        var modal = $(this)
        modal.find('.modal-body #nom').val(nom)
        modal.find('.modal-body #prenom').val(prenom)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #num_tel').val(num_tel)
    })


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



</script>


</body>

</html>
