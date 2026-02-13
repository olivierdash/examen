<?php
    namespace app\Controllers;
    use app\models\Objet;
    class ObjetController 
    {
        public static function create($nom, $description, $prix, $idProprietaire, $idCategorie) {
            $objet = new Objet();
            $objet->create($nom, $description, $prix, $idProprietaire, $idCategorie);
        }
    }
    
?>