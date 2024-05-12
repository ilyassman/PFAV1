<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réinitialisation de mot de passe</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f0f0;  /* Light gray background */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
      padding: 40px;
      width: 400px;  /* Set a maximum width for responsiveness */
      text-align: center;
      margin-bottom: 20px; /* Add some margin for better spacing */
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
      font-size: 24px; /* Adjust heading size */
    }

    .code-container {
      background-color: #f2f2f2; /* Light gray background for code container */
      padding: 10px; /* Add some padding around the code */
      border-radius: 5px; /* Rounded corners */
      margin-bottom: 30px;
    }

    .code {
      font-size: 28px; /* Adjust code size */
      font-weight: bold;
      color: #28a745; /* Green for code */
    }

    .btn {
      background-color: #28a745; /* Green button */
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 12px 25px; /* Adjust button padding */
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #218c3d; /* Darker green on hover */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Réinitialisation de mot de passe</h2>
    <div class="code-container">
      <p>Votre code de réinitialisation :</p>
      <span class="code">{{$data}}</span>
    </div>
  </div>
</body>
</html>
