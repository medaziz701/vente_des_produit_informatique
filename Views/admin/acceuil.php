<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Admin</title>
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

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 10px;
            text-align: center;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
        }

        td a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        td a:hover {
            color: #0056b3;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
        }

        footer p {
            color: #777;
            font-size: 14px;
        }

        .button {
            display: block;
            width: 100%;
            max-width: 200px;
            padding: 10px 20px;
            margin: 0 auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button.secondary {
            background-color: #ccc;
            color: #333;
        }

        .button.secondary:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Accueil - Administration</h1>

        
        <?php if ($produits): ?>
            <h2>Liste des Produits</h2>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($produits as $produit): ?>
                    <tr>
                        <td><?php echo $produit->getNom(); ?></td>
                        <td><?php echo $produit->getDescription(); ?></td>
                        <td><?php echo $produit->getPrix(); ?>€</td>
                        <td>
                            <a href="index.php?action=updateform&id=<?php echo $produit->getId(); ?>">Modifier</a> |
                            <a href="index.php?action=delete&id=<?php echo $produit->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucun produit trouvé.</p>
        <?php endif; ?>

        <a href="Views/admin/create.php" class="button">Ajouter un produit</a>
        <a href="index.php" class="button secondary">Retour à l'accueil</a>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Votre Société. Tous droits réservés.</p>
    </footer>
</body>
</html>
