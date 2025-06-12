<?php

require_once __DIR__ . '/../Models/Produit.php';


class AdminController {
    
    public function login() {
        session_start();
        if ($_POST['username'] === 'Chaabani aziz' && $_POST['password'] === 'motdepasse') {
            $_SESSION['logged_in'] = true;
            $produits = Produit::getAll(); 
            require_once(__DIR__ . '/../Views/admin/acceuil.php');
        } else {
        $_SESSION['error'] = 'Identifiants incorrects';
        header("Location: Views/login.php");
        exit();
        }
    }
    public function Accueil() {
        $produits = Produit::getAll(); 
        require_once(__DIR__ . '/../Views/admin/acceuil.php');
    }
    
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $prix = isset($_POST['prix']) ? $_POST['prix'] : '';
    
            if (!empty($nom) && !empty($description) && !empty($prix)) {
                $nouveauProduit = new Produit();
                $nouveauProduit->setNom($nom);
                $nouveauProduit->setDescription($description);
                $nouveauProduit->setPrix($prix);
    
                $nouveauProduit->save();
    
                header("Location: index.php?action=adminAccueil");
                exit();
            } else {
                echo "Veuillez remplir tous les champs du formulaire";
            }
        } else {
            require_once(__DIR__ . '/../Views/admin/create.php');
        }
    }
    
    
    public function updateform($id) {
       
        $produit = Produit::getById($id);
        if ($produit) {
            require_once(__DIR__ . '/../Views/admin/update.php');
        } else {
            echo "erreur d'identification produit";
        }
    }
    public function update(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $prix = isset($_POST['prix']) ? $_POST['prix'] : '';
            
          
            
            $produit = new Produit();
            $produit->setId($id);
            $produit->setNom($nom);
            $produit->setDescription($description);
            $produit->setPrix($prix);
            
            
            if ($produit->update()) {
                header("Location: index.php?action=adminAccueil");
                exit();
            } else {
              
                echo "Une erreur s'est produite lors de la mise a jour du produit";
            }
        } else {
            header("Location: index.php?action=adminAccueil");
            exit();
        }
    }
    
    
    public function delete($id) {
     
        $produit = Produit::getById($id);
        if ($produit) {
            $produit->delete($id);
            
            header("Location: index.php?action=adminAccueil");
            exit();
        } else {
            echo "Produit non trouvé";
            
            exit();
        }
    }

}

?>
