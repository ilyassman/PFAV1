<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réunion de Formation</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      background-color: #f8f8f8;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }
    p {
      color: #666;
      font-size: 16px;
      margin-bottom: 15px;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Bonjour {{$nom}} {{$prenom}},</h2>
    <p>Nous sommes ravis de vous informer que la réunion de formation <strong>{{$formation}}</strong> est sur le point de débuter. Pour vous connecter , veuillez suivre le lien ci-dessous :</p>
    <p style="text-align: center;"><a href="{{$lien}}" class="btn">Lien de la réunion</a></p>
 

  </div>
</body>
</html>
