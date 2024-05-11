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
        <x-header/>
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
                <img src="Formationpic/{{$formation->image}}" alt="Image de la formation">
            </div>
            <div class="formulaire">
                <form action="{{route('addemande',['id' => Crypt::encrypt($formation->id)])}}" method="post">
                    @csrf
                    <div class="form_row">
                        <div class="form_group">
                            <label for="nom">Nom :</label>
                            <input  value="{{ !empty($membre) ? $membre[0]->nom : '' }}" @if(!empty($membre)) readonly @endif type="text" id="nom" name="nom" required>
                        </div>
                        <div class="form_group">
                            <label for="prenom">Prénom :</label>
                            <input  value="{{ !empty($membre) ? $membre[0]->prenom : '' }}" @if(!empty($membre)) readonly @endif type="text" id="prenom" name="prenom" required>
                        </div>
                    </div>
                    <div class="form_row">
                        <div class="form_group">
                            <label for="email">Email :</label>
                            <input  value="{{ !empty($membre) ? $membre[0]->email : '' }}" @if(!empty($membre)) readonly @endif type="email" id="email" name="email" required>
                        </div>
                        <div class="form_group">
                            <label for="tel">Téléphone :</label>
                            <input type="tel" id="tel" name="tel" value="{{ !empty($membre) ? $membre[0]->num_tel : '' }}" @if(!empty($membre)) readonly @endif required>
                        </div>
                    </div>
                    <div class="form_row">
                        <div class="form_group">
                            <label for="pays">Pays :</label>
                            <select id="pays" name="pays" required style="width: 300px;">
                                <option value="">Sélectionnez un pays</option>
                            </select>
                        </div>
                    </div>
                    <div class="form_group">
                        <input type="submit" value="Soumettre">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(isset($datas))
    <x-footer :datas="$datas" />
    @endif
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
      function fetchCountries() {
    fetch('https://restcountries.com/v3.1/all')
    .then(response => response.json())
    .then(data => {
        const select = document.getElementById('pays');

        // Tri des pays par ordre alphabétique
        data.sort((a, b) => {
            if (a.name.common < b.name.common) return -1;
            if (a.name.common > b.name.common) return 1;
            return 0;
        });

        // Ajout des pays triés à la liste déroulante
        data.forEach(country => {
            const option = document.createElement('option');
            option.value = country.name.common;
            option.textContent = country.name.common;
            select.appendChild(option);
        });
    })
    .catch(error => console.error('Erreur lors de la récupération des pays :', error));
}

// Appel de la fonction pour récupérer les pays au chargement de la page
fetchCountries();

  </script>

</body>

</html>
