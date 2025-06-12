<?php

require_once 'Database.php';

class Commande {
    private $id;
    private $client_id;
    private $date_commande;
    private $total;

    public function getId() {
        return $this->id;
    }

    public function getClientId() {
        return $this->client_id;
    }

    public function getDateCommande() {
        return $this->date_commande;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setClientId($client_id) {
        $this->client_id = $client_id;
    }

    public function setDateCommande($date_commande) {
        $this->date_commande = $date_commande;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function save() {
        $rq = "INSERT INTO commandes (client_id, date_commande, total) VALUES (:client_id, :date_commande, :total)";
        $tab = [':client_id' => $this->client_id, ':date_commande' => $this->date_commande, ':total' => $this->total];
        $success = Database::execute($rq, $tab);
        if ($success) {
            
            $this->id = Database::getConx()->lastInsertId();

        }
        return $success;
    }
    
    

    public static function getAll() {
        $rq = "SELECT * FROM commandes";
        return Database::query($rq, 'Commande');
    }

    public static function getById($id) {
        $rq = "SELECT * FROM commandes WHERE id = :id";
        $tab = [':id' => $id];
        $result = Database::query($rq, 'Commande', $tab);
        return isset($result[0]) ? $result[0] : null;
    }

    public function update() {
        $rq = "UPDATE commandes SET client_id = :client_id, date_commande = :date_commande, total = :total WHERE id = :id";
        $tab = [':client_id' => $this->client_id, ':date_commande' => $this->date_commande, ':total' => $this->total, ':id' => $this->id];
        return Database::execute($rq, $tab);
    }

    public function delete() {
        $rq = "DELETE FROM commandes WHERE id = :id";
        $tab = [':id' => $this->id];
        return Database::execute($rq, $tab);
    }
}

?>
