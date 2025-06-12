<?php

require_once __DIR__ . '/../Models/Produit.php';
require_once __DIR__ . '/../Models/Commande.php';
require_once __DIR__ . '/../Models/Client.php';
require_once __DIR__ . '/../Models/DetailCommande.php';


class ClientController {
    
    public function accueil() {
        $produits = Produit::getAll(); 
        require_once(__DIR__ . '/../Views/client/accueil.php');
    }
    
    public function passerCommande() {
  
        
        
        $produits = Produit::getAll(); 
        require_once(__DIR__ . '/../Views/client/passer_commande.php');
    }
    
    

    public function detailsCommande($commande_id) {
       
        header("Location: /Projetaziz/Views/client/details_produit.php?commande_id=$commande_id");
        var_dump($commande_id);
        exit();
    }
    
    public function traiterSoumissionCommande() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
            $produitId = isset($_POST['produit_id']) ? $_POST['produit_id'] : '';
            $quantite = isset($_POST['quantite']) ? $_POST['quantite'] : '';
            
            if ($nom && $email && $adresse && $telephone && $produitId && $quantite ) {
                
            
                
$client = new Client();
$client->setNom($nom);
$client->setEmail($email);
$client->setAdresse($adresse);
$client->setTelephone($telephone);
$client->save(); 
$clientId = $client->getId(); 

$produit = Produit::getById($produitId);
if ($produit) {
    $total = $produit->getPrix() * $quantite;

    $commande = new Commande();
    $commande->setClientId($clientId);
    $commande->setDateCommande(date('Y-m-d'));
    $commande->setTotal($total);
    $commande->save();
    
   


    
                    $commandeId = $commande->getId();
    
                    $detailCommande = new DetailCommande();
                    $detailCommande->setCommandeId($commandeId );
                    $detailCommande->setProduitId($produitId);
                    $detailCommande->setQuantite($quantite);
                    $detailCommande->setPrixUnitaire($produit->getPrix());
                    $detailCommande->save();
                    
                    header("Location: /Projetaziz/index.php?action=detailsCommande&commande_id=$commandeId ");
                    exit();
                } else {
                    $message = "Erreur : Produit non trouvé.";
                }
            } else {
                $message = "Erreur : Veuillez remplir tous les champs du formulaire.";
            }
        }
    }
    
   
    
    


    }
    
    



?>
