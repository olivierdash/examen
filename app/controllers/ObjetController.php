<?php
    namespace app\Controllers;
    use Flight;
    use PDO;

    class ObjetController 
    {
        public static function create($idProprietaire) {
            $objet = new Objet();
            $objet->create($idProprietaire);
        }
    }
    
?>