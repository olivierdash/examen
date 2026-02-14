<?php
    namespace app\Controllers;
    use app\models\Categorie;
    class CategorieController 
    {
        public static function getAll() {
            return Categorie::getAll();
        }

        public static function getById($id) {
            return Categorie::getById($id);
        }
    }
?>