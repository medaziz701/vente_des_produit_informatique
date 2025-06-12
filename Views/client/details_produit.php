<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
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

        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Détails de la commande</h2>
        <?php
        require_once __DIR__ . '/../../Models/DetailCommande.php';
        $detailsCommande = DetailCommande :: getByCommandeId($_GET['commande_id']);

        if ($detailsCommande) {
            ?>
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($detailsCommande as $detail) { ?>
                    <tr>
                        <td><?php echo $detail->getProduitId(); ?></td>
                        <td><?php echo $detail->getQuantite(); ?></td>
                        <td><?php echo $detail->getPrixUnitaire(); ?></td>
                        <td><?php echo $detail->getQuantite() * $detail->getPrixUnitaire(); ?></td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        } else {
            echo "Aucun détail de commande trouvé.";
        }
        ?> 
        <a href="../../index.php">Retour à l'accueil</a>
    </div>
</body>
</html>
