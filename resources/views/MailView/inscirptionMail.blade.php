<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau compte créé</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #495057;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .credentials {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .credentials p {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .credentials strong {
            font-weight: bold;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bonjour {{ $data['prenom'] }} {{ $data['nom'] }},</h2>
        <p>Un nouveau compte a été créé pour vous sur le site « Plate-forme de formation en ligne » et un mot de passe vous a été délivré. Les informations nécessaires à votre connexion sont maintenant :</p>
        <div class="credentials">
            <p><strong>Email :</strong> {{ $data['mail'] }}</p>
            <p><strong>Mot de passe :</strong> {{ $data['pass'] }}</p>
        </div>
        <p>Connectez-vous dès maintenant et commencez à explorer nos services.</p>
        <a class="button" href="{{route('profile')}}">Se connecter</a>
    </div>
</body>
</html>
