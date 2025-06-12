<?php

require_once 'Database.php';

class DetailCommande {
    private $id;
    private $commande_id;
    private $produit_id;
    private $quantite;
    private $prix_unitaire;

    public function getId() {
        return $this->id;
    }

    public function getCommandeId() {
        return $this->commande_id;
    }

    public function getProduitId() {
        return $this->produit_id;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getPrixUnitaire() {
        return $this->prix_unitaire;
    }

    public function setCommandeId($commande_id) {
        $this->commande_id = $commande_id;
    }

    public function setProduitId($produit_id) {
        $this->produit_id = $produit_id;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setPrixUnitaire($prix_unitaire) {
        $this->prix_unitaire = $prix_unitaire;
    }
    public function setId($id) { 
        $this->id = $id; 
    }

    public static function getByCommandeId($id) {
        $rq = "SELECT * FROM details_commande WHERE commande_id = :id";
        $tab = [':id' => $id];
        $results = Database::query($rq, 'DetailCommande', $tab);
        
        
        $detailCommandes = [];
        
        foreach ($results as $result) {
            $detailCommande = new DetailCommande();
            $detailCommande->setId($result->id);
            $detailCommande->setCommandeId($result->commande_id);
            $detailCommande->setProduitId($result->produit_id);
            $detailCommande->setQuantite($result->quantite);
            $detailCommande->setPrixUnitaire($result->prix_unitaire);
            
            // Ajouter l'objet DetailCommande au tableau
            $detailCommandes[] = $detailCommande;
        }
        
        return $detailCommandes;
    }


    public function save() {
        $rq = "INSERT INTO details_commande (commande_id, produit_id, quantite, prix_unitaire) VALUES (:commande_id, :produit_id, :quantite, :prix_unitaire)";
        $tab = [
            ':commande_id' => $this->commande_id,
            ':produit_id' => $this->produit_id,
            ':quantite' => $this->quantite,
            ':prix_unitaire' => $this->prix_unitaire
        ];
        return Database::execute($rq, $tab);
    }
    
    
    
    
    
    
    

    
}

?>
