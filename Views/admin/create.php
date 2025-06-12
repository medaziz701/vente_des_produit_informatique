<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
    <link rel="stylesheet" type="text/css" href="../../assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../../assets/images/background.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

       
        .cancel-button {
            display: inline-block;
            background-color: #ccc;
            color: #333;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .cancel-button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <h1>Créer un produit</h1>
    <form action="../../index.php?action=create" method="POST">
        <label for="nom">Nom du produit:</label><br>
        <input type="text" id="nom" name="nom"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        
        <label for="prix">Prix:</label><br>
        <input type="number" id="prix" name="prix"><br>
        
        <input type="submit" value="Créer">
      
        <a href="../../index.php?action=adminAccueil" class="cancel-button">Annuler</a>
    </form>
</body>
</html>
