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
    private $idCategorie;
    private $db;

    public function __construct($nom = null, $description = null, $prix = null, $id = null, $idProprietaire = null, $idCategorie = null)
    {
        $this->id = $id;
        $this->idProprietaire = $idProprietaire;
        $this->idCategorie = $idCategorie;
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

    public function getIdCategorie()
    {
        return $this->idCategorie;
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

    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }

    public function getByUser($idProprietaire) {
        $sql = "SELECT * FROM Objet WHERE IdProprietaire = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idProprietaire]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteById($id) {
        $sql = "DELETE FROM Objet WHERE ID = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM Objet WHERE ID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $sql = "SELECT * FROM Objet";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nom, $description, $prix, $idProprietaire, $idCategorie) {
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setPrix($prix);
        $this->setIdProprietaire($idProprietaire);
        $this->setIdCategorie($idCategorie);
        $sql = "INSERT INTO Objet (Titre, Description, Prix, IdProprietaire, IdCategorie) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$this->nom, $this->description, $this->prix, $idProprietaire, $this->idCategorie]);
    }
}

?>