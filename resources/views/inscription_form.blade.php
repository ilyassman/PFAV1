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

 /* Reset des marges et paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Style pour le conteneur principal */
.form_container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* Style pour les informations au-dessus du formulaire */
.form_infos {
    margin-bottom: 20px;
}
.form_infos h2 {
    margin-bottom: 20px;
    margin-top: 30px ;
    font-weight: 600 ;
}
.form_infos p {
    width: 100%;
}

/* Style pour le contenu en bas */
.content {
    display: flex;
    justify-content: space-between;
    width: 90%; /* Ajustez la largeur selon vos besoins */
    margin-top: 20px;
    margin-bottom: 60px ;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 40px;
}

/* Style pour la zone de l'image */
.image {
    flex: 1;
    margin-right: 20px;
}

.image img {
    max-width: 100%;
    height: auto;
    border-radius : 10px ;
}

/* Style pour la zone du formulaire */
.formulaire {
    flex: 1;
    margin-left: 20px;

}

/* Style pour les étiquettes des champs */
label {
    display: block;
    margin-bottom: 5px;
}

/* Style pour les champs de saisie */
input[type="text"],
input[type="email"],
input[type="tel"],
select {
    width: 90%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style pour les groupes de formulaire (deux champs dans la même ligne) */
.form_row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 15px;
}

/* Style pour les groupes de formulaire (deux champs dans la même ligne) */
.form_group {
    flex: 1;
    margin-right: 5px;
}

/* Style pour le bouton de soumission */
input[type="submit"] {
    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Changement de couleur du bouton au survol */
input[type="submit"]:hover {
    background-color: #45a049;
}

/* Media query pour la responsivité */
@media screen and (max-width: 768px) {
    .content {
        flex-direction: column;
        align-items: center;
    }
    .formulaire {
        margin-left: 0;
        margin-top: 20px;
    }
    input[type="submit"] {
        width: 100%;
    }
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


    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{ route('courses') }}">Cours</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Cours</span>
      </div>
    </div>

    <div class="form_container">
        <div class="form_infos">
            <h2>Veuillez compléter notre formulaire d'inscription.</h2>
            <p>Complétez notre formulaire d'inscription dès à présent afin que nous puissions mieux vous comprendre et vous offrir l'opportunité de participer à notre formation.</p>
        </div>
        <div class="content">
            <div class="image">
                <!-- Insérez votre image représentant la formation ici -->
                <img src="images/course_3.jpg" alt="Image de la formation">
            </div>
            <div class="formulaire">
                <form action="traitement.php" method="post">
                    <div class="form_row">
                        <div class="form_group">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" required>
                        </div>
                        <div class="form_group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" required>
                        </div>
                    </div>
                    <div class="form_row">
                        <div class="form_group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form_group">
                            <label for="tel">Téléphone :</label>
                            <input type="tel" id="tel" name="tel" required>
                        </div>
                    </div>
                    <div class="form_row">
                        <div class="form_group">
                            <label for="pays" >Pays :</label>
                            <input type="text" id="pays" name="pays" required  style="width: 300px ;">
                        </div>
                    </div>
                    <div class="form_group">
                        <input type="submit" value="Soumettre">
                    </div>
                </form>
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
