<?php
namespace app\Models;
use Flight;
use PDO;

class Categorie
{
    private $ID;
    private $Nom;
    private $Description; // Ajouté selon votre schéma SQL
    private $db;

    public function __construct($ID = null, $Nom = null, $Description = null)
    {
        $this->ID = $ID;
        $this->Nom = $Nom;
        $this->Description = $Description;
        $this->db = Flight::db();
    }

    // --- GETTERS & SETTERS ---
    public function getId()
    {
        return $this->ID;
    }
    public function setId($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    public function getNom()
    {
        return $this->Nom;
    }
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
        return $this;
    }

    public function getDescription()
    {
        return $this->Description;
    }
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    // --- MÉTHODES CRUD ---

    /**
     * Récupère toutes les catégories
     */
    public static function getAll()
    {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM Categorie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une catégorie par son ID
     */
    public static function getById($ID)
    {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM Categorie WHERE ID = ?");
        $stmt->execute([$ID]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne un tableau associatif
    }
    /**
     * Insère ou met à jour la catégorie
     */
    public function save()
    {
        if ($this->ID) {
            // Update
            $stmt = $this->db->prepare("UPDATE Categorie SET Nom = ?, Description = ? WHERE ID = ?");
            return $stmt->execute([$this->Nom, $this->Description, $this->ID]);
        } else {
            // Create
            $stmt = $this->db->prepare("INSERT INTO Categorie (Nom, Description) VALUES (?, ?)");
            $res = $stmt->execute([$this->Nom, $this->Description]);
            $this->ID = $this->db->lastInsertId();
            return $res;
        }
    }

    /**
     * Supprime la catégorie
     */
    public function delete()
    {
        if ($this->ID) {
            $stmt = $this->db->prepare("DELETE FROM Categorie WHERE ID = ?");
            return $stmt->execute([$this->ID]);
        }
        return false;
    }
}