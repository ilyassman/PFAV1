<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat</title>
    <style type='text/css'>
        @page {
            size: A4 landscape; /* Définir la taille de la page PDF */
            margin: 0; /* Supprimer les marges par défaut */
        }
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 18px;
            text-align: center;
            color: #333;
        }
        .container {
            border: 20px solid #3f51b5; /* Couleur violette */
            width: 750px;
            height: 563px;
            margin: auto; /* Centrer la certification horizontalement */
            padding: 20px; /* Ajouter un peu d'espace intérieur */
            box-sizing: border-box; /* Inclure les bordures dans les dimensions */
        }
        .logo {
            color: #3f51b5; /* Couleur violette */
            font-size: 24px;
            font-weight: bold;
        }
        .marquee {
            color: #3f51b5; /* Couleur violette */
            font-size: 36px;
            margin: 20px 0;
        }
        .assignment {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .person {
            border-bottom: 2px solid #333; /* Couleur noire */
            font-size: 28px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }
        .reason {
            margin-top: 20px;
            font-style: italic;
        }
        .date {
            margin-top: 40px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            {{$ecole->nom}}
        </div>

        <div class="marquee">
            Certificat de Réussite
        </div>

        <div class="assignment">
            Ce certificat est décerné à
        </div>

        <div class="person">
            {{$membre->prenom}} {{$membre->nom}}
        </div>

        <div class="reason">
            Pour avoir complété avec succès la formation {{$formation->titre}}
        </div>

        <div class="date">
            Date de certification: {{ date('d/m/Y') }}
        </div>
    </div>
</body>
</html>
