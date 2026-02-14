<?php
    namespace app\Controllers;
    use app\models\Objet;
    class ObjetController 
    {

        public static function getAll() {
            $objt = new Objet();
            return $objt->getAll();
        }

        public static function create($nom, $description, $prix, $idProprietaire, $idCategorie) {
            $objet = new Objet();
            $objet->create($nom, $description, $prix, $idProprietaire, $idCategorie);
        }

        public static function getByUser($idProprietaire) {
            $objet = new Objet();
            return $objet->getByUser($idProprietaire);
        }

        public static function getById($id) {
            $objet = new Objet();
            return $objet->getById($id);
        }
    }
    
?>