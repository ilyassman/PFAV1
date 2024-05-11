<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat</title>
    <style type='text/css'>
        @page {
            size: A4 landscape;
            /* Définir la taille de la page PDF */
            margin: 0;
            /* Supprimer les marges par défaut */
        }

        .certif_container {
            display: flex;
            /* Activer le mode flexbox pour le conteneur */
            justify-content: center;
            /* Centrer horizontalement */
            align-items: center;
            /* Centrer verticalement */
            height: 100vh;
            /* Remplir la hauteur de la fenêtre */
            width: 100vw;
            /* Remplir la largeur de la fenêtre */
            font-family: 'Calibri' ;
        }

        .certif {
            position: absolute;
            /* Positionnement absolu pour un contrôle précis */
            top: 50%;
            /* Centrer verticalement */
            left: 50%;
            /* Centrer horizontalement */
            transform: translate(-50%, -50%);
            /* Annuler le décalage automatique du positionnement absolu */
            border: 2px solid rgb(24, 24, 53);
            width: 94%;
            height: 94%;
  text-align: center;
            color: rgb(24, 24, 53);
        }

        .marquee {
            margin-top: 15px;
            text-align: center;
            text-align: center;
        }

        .marquee .first {
            font-size: 74px;
            font-weight: 600;
            text-align: center;
        }

        .marquee .second {
            font-size: 45px;
            font-weight: 400;
            margin-top: -50px;
            letter-spacing: 5px;
            text-align: center;
        }

        .assignment {
            font-size: 40px;
            font-weight: 400;
            text-align: center;
        }

        .person {
            font-size: 65px;
            font-weight: 500;
            text-align: center;
        }

        .felicitation {
            margin: 15px 100px;
            text-align: center;
        }

        .felicitation span {
            font-weight: 700;
            text-align: center;
        }
        .underline {
    border-bottom: 2px solid rgb(24, 24, 53); /* Crée un soulignement bleu */
    font-size: 18px;
}
.plateform_name h4 {
    font-size:26px;
    font-weight: 600;
    margin-top: -10px;
}
.plateform_name h4 span {
    font-size: 14px;
    font-weight: 400;
}
img {
    margin-top: 25px;
    height: 125px;
    width: auto;
}
    </style>
</head>

<body>
    <div class="certif_container">
        <div class="certif">
            <div class="marquee">
                <h1 class="first">Certificat</h1>
                <h1 class="second">de Réussite</h1>
            </div>
            <div class="assignment">
                Ce certificat est décerné à
            </div>
            <div class="person">
                {{ $membre->prenom }} {{ $membre->nom }}
            </div>
            <div class="felicitation">
                Félicitations pour avoir réussi la formation <span>{{ $formation->titre }}!</span>
                Ce certificat récompense votre engagement et vos efforts dans l'acquisition de nouvelles compétences. Il
                témoigne de votre investissement dans votre développement personnel et professionnel.
            </div>
            <div class="footer">
                <div class="plateform_name">
                    <h3><span class="underline">Délivré par :</span></h3>
                    <h4>{{ $ecole->nom }} <span>le {{ date('d/m/Y') }}</span></h4>
                </div>
                <div class="logo">
                    <img src="logo_jpg.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
