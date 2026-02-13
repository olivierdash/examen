<?php
    class ObjetImages
    {
        private $id;
        private $idObjet;
        private $urlImage;
        private $db;

        public function __construct($id = null, $idObjet = null, $urlImage = null)
        {
            $this->id = $id;
            $this->idObjet = $idObjet;
            $this->urlImage = $urlImage;
            $this->db = Flight::db(); // Récupère la connexion PDO depuis Flight::app() dans config.php
        }

        // --- Getters ---
        public function getId()
        {
            return $this->id;   
        }

        public function getIdObjet()
        {
            return $this->idObjet;
        }

        public function getUrlImage()
        {
            return $this->urlImage;
        }

        // --- Setters ---
        public function setIdObjet($idObjet)
        {
            $this->idObjet = $idObjet;
        }

        public function setUrlImage($urlImage)
        {
            $this->urlImage = $urlImage;
        }

        // --- Méthodes CRUD ---
        public function create() {
            $stmt = $this->db->prepare("INSERT INTO Objet_image (IdObjet, nom) VALUES (?, ?)");
            return $stmt->execute([$this->idObjet, $this->urlImage]);
        }

        public static function getByIdObjet($idObjet) {
            $db = Flight::db();
            $stmt = $db->prepare("SELECT * FROM Objet_image WHERE IdObjet = ?");
            $stmt->execute([$idObjet]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete() {
            if (!$this->id) return false;
            $stmt = $this->db->prepare("DELETE FROM Objet_image WHERE ID = ?");
            return $stmt->execute([$this->id]);
        }


    }
?>