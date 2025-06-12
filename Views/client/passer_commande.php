<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une commande</title>
    <link rel="stylesheet" href="assets/style.css">
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

        form {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
        }

        h2, p {
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h2 style="text-align: center; color: #333; font-size: 36px; margin-bottom: 20px;">Bienvenue dans notre Boutique en ligne !</h2>
<p style="text-align: center; color: #555; font-size: 18px;">Pour passer une commande, veuillez remplir le formulaire ci-dessous :</p>

    <form action="/Projetaziz/index.php?action=traiterSoumissionCommande" method="POST">
        <input type="hidden" id="id" name="id" value="7">
        
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="adresse">Adresse :</label><br>
        <input type="text" id="adresse" name="adresse" required><br><br>

        <label for="telephone">Téléphone :</label><br>
        <input type="number" id="telephone" name="telephone" required><br><br>

        <label for="produit_id">Produit :</label><br>
        <select id="produit_id" name="produit_id" required>
            <?php foreach ($produits as $produit): ?>
                <option value="<?= $produit->getId(); ?>"><?= $produit->getNom(); ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="quantite">Quantité :</label><br>
        <input type="number" id="quantite" name="quantite" value="1" min="1" required><br><br>

        <input type="submit" value="Passer la Commande">
        <button type="button" onclick="window.location.href='index.php'">Annuler</button>
    </form>
</body>
</html>
