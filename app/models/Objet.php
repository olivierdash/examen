<?php
namespace app\Models;
use Flight;
use PDO;
class Objet
{
    private $id;
    private $nom;
    private $description;
    private $prix;
    private $idProprietaire;
    private $db;

    public function __construct($nom = null, $description = null, $prix = null, $id = null, $idProprietaire = null)
    {
        $this->id = $id;
        $this->idProprietaire = $idProprietaire;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->db = Flight::db(); // Récupère la connexion PDO depuis Flight::app() dans config.php
    }

    // --- Getters ---
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    public function getIdProprietaire()
    {
        return $this->idProprietaire;
    }

    
    // --- Setters ---
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setIdProprietaire($idProprietaire)
    {
        $this->idProprietaire = $idProprietaire;
    }

    public function deleteById($id) {
        $sql = "DELETE FROM objets WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM objets WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $sql = "SELECT * FROM objets";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($idProprietaire) {
        $sql = "INSERT INTO objets (nom, description, prix, idProprietaire) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$this->nom, $this->description, $this->prix, $idProprietaire]);
    }
}

?>