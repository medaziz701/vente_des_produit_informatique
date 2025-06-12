<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Client</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('assets/images/background.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 18px;
            color: #555;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .product {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease-in-out;
            text-align: center;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .product-name {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .product-description {
            color: #666;
            margin-bottom: 10px;
        }

        .product-price {
            color: #007bff;
            font-size: 18px;
            font-weight: bold;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
            margin: 0 10px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Accueil - Client</div>
            <div class="subtitle">Bienvenue sur la page d'accueil du client.</div>
        </div>

        <h2>Liste des Produits</h2>
        <ul class="product-list">
    <?php foreach ($produits as $produit): ?>
        <li class="product">
            <img src="assets/images/<?php echo $produit->getNom(); ?>.jpg" alt="<?php echo $produit->getNom(); ?>">
            <div class="product-name"><?php echo $produit->getNom(); ?></div>
            <div class="product-description"><?php echo $produit->getDescription(); ?></div>
            <div class="product-price"><?php echo $produit->getPrix(); ?> €</div>
        </li>
    <?php endforeach; ?>
</ul>


        <div class="button-container">
            <a href="index.php?action=passerC" class="button">Ajouter une commande</a>
            <a href="Views/login.php" class="button">Accéder à l'interface d'administration</a>
        </div>
    </div>
</body>
</html>
