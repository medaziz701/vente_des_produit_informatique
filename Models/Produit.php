<?php

require_once 'Database.php';

class Produit {
    private $id;
    private $nom;
    private $description;
    private $prix;

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function save() {
        $rq = "INSERT INTO produits (nom, description, prix) VALUES (:nom, :description, :prix)";
        $tab = [':nom' => $this->nom, ':description' => $this->description, ':prix' => $this->prix];
        return Database::execute($rq, $tab);
    }

    public static function getAll() {
        $rq = "SELECT * FROM produits";
        return Database::query($rq, 'Produit');
    }

    public static function getById($id) {
        $rq = "SELECT * FROM produits WHERE id = :id";
        $tab = [':id' => $id];
        $result = Database::query($rq, 'Produit', $tab);
        return isset($result[0]) ? $result[0] : null;
    }

    public function update() {
        $rq = "UPDATE produits SET nom = :nom, description = :description, prix = :prix WHERE id = :id";
        $tab = [':nom' => $this->nom, ':description' => $this->description, ':prix' => $this->prix, ':id' => $this->id];
        return Database::execute($rq, $tab);
    }

    public function delete($id) {
        $rq = "DELETE FROM produits WHERE id = :id";
        $tab = [':id' => $id];
        return Database::execute($rq, $tab);
    }
    
    
}

?>
