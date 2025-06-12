<?php

require_once 'Database.php';

class Client {
    private $id;
    private $nom;
    private $email;
    private $adresse;
    private $telephone;

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function save() {
        $rq = "INSERT INTO clients (nom, email, adresse, telephone) VALUES (:nom, :email, :adresse, :telephone)";
        $tab = [':nom' => $this->nom, ':email' => $this->email, ':adresse' => $this->adresse, ':telephone' => $this->telephone];
        $success =  Database::execute($rq, $tab);
        if ($success) {
            
            $this->id = Database::getConx()->lastInsertId();

        }
        return $success;
    }
   
    

    public static function getAll() {
        $rq = "SELECT * FROM clients";
        return Database::query($rq, 'Client');
    }

    public static function getById($id) {
        $rq = "SELECT * FROM clients WHERE id = :id";
        $tab = [':id' => $id];
        $result = Database::query($rq, 'Client', $tab);
        return isset($result[0]) ? $result[0] : null;
    }
    public static function getByEmail($email) {
        $rq = "SELECT * FROM clients WHERE email = :email";
        $tab = [':email' => $email];
        $result = Database::query($rq, 'Client', $tab);
        return isset($result[0]) ? $result[0] : null;//yaani si $result[0] n'est pas definie bch yraja3 null
    }
    

    public function update() {
        $rq = "UPDATE clients SET nom = :nom, email = :email, adresse = :adresse, telephone = :telephone WHERE id = :id";
        $tab = [':nom' => $this->nom, ':email' => $this->email, ':adresse' => $this->adresse, ':telephone' => $this->telephone, ':id' => $this->id];
        return Database::execute($rq, $tab);
    }

    public function delete() {
        $rq = "DELETE FROM clients WHERE id = :id";
        $tab = [':id' => $this->id];
        return Database::execute($rq, $tab);
    }
}

?>
