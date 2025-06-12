<?php

class Database{
    private static $conx;
    
    private static function init(){
        self::$conx = new PDO ("mysql:host=localhost;dbname=vente_des_produit_informatique","root","");
    }
    
  
    public static function getConx(){
        if(self::$conx == NULL){
            self::init();//donc connecter
        }
        return self::$conx;
    }
    
    
    public static function execute($rq, $tab){
        $stm = self::getConx()->prepare($rq);//il faut connecter + preparer la req
        $r = $stm->execute($tab); 
        return $r;//yraj3 boolean 
    }
    
    
    public static function query($rq, $class, $tab = array()){
        $stm = self::getConx()->prepare($rq);
        $r = $stm->execute($tab);
        return $stm->fetchAll(PDO::FETCH_CLASS, $class);
    }
}
?>
