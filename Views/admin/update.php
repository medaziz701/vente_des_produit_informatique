<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/images/background.jpg');
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
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3;
        }

        button {
            display: inline-block;
            background-color: #ccc;
            margin-left: 10px;
        }

        button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <h1>Modifier Produit</h1>
    <form action="index.php?action=update" method="post">
        <input type="hidden" name="id" value="<?php echo $produit->getId(); ?>"> 
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" value="<?php echo $produit->getNom(); ?>"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $produit->getDescription(); ?></textarea><br>
        <label for="prix">Prix:</label><br>
        <input type="text" id="prix" name="prix" value="<?php echo $produit->getPrix(); ?>"><br><br>
        <input type="submit" value="Modifier">
        <a href="index.php?action=adminAccueil"><button>Annuler</button></a>
    </form>
</body>
</html>
