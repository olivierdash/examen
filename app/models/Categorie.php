<?php
    namespace app\Models;
    use Flight;
    use PDO;

class Categorie
{
    private $id;
    private $nom;
    private $description; // Ajouté selon votre schéma SQL
    private $db;

    public function __construct($id = null, $nom = null, $description = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->db = Flight::db();
    }

    // --- GETTERS & SETTERS ---
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; return $this; }

    public function getNom() { return $this->nom; }
    public function setNom($nom) { $this->nom = $nom; return $this; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; return $this; }

    // --- MÉTHODES CRUD ---

    /**
     * Récupère toutes les catégories
     */
    public static function getAll() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM Categorie");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Récupère une catégorie par son ID
     */
    public static function getById($id) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM Categorie WHERE ID = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(self::class);
    }

    /**
     * Insère ou met à jour la catégorie
     */
    public function save() {
        if ($this->id) {
            // Update
            $stmt = $this->db->prepare("UPDATE Categorie SET Nom = ?, Description = ? WHERE ID = ?");
            return $stmt->execute([$this->nom, $this->description, $this->id]);
        } else {
            // Create
            $stmt = $this->db->prepare("INSERT INTO Categorie (Nom, Description) VALUES (?, ?)");
            $res = $stmt->execute([$this->nom, $this->description]);
            $this->id = $this->db->lastInsertId();
            return $res;
        }
    }

    /**
     * Supprime la catégorie
     */
    public function delete() {
        if ($this->id) {
            $stmt = $this->db->prepare("DELETE FROM Categorie WHERE ID = ?");
            return $stmt->execute([$this->id]);
        }
        return false;
    }
}