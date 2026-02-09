<?php
    namespace app\Models;
    use Flight;
    use PDO;
class User
{
    // Propriétés privées (correspondent aux colonnes de la base)
    private $id;
    private $nom;
    private $email;
    private $motDePasse;
    private $db;

    // Constructeur
    public function __construct($nom = null, $email = null, $motDePasse = null, $id = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
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
    public function getEmail()
    {
        return $this->email;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    // --- Setters ---
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Note : En production, on hache toujours le mot de passe
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);
    }

    /**
     * Exemple de méthode pour sauvegarder l'utilisateur en base de données
     */
    public function create($nom, $email, $mdp)
    {
        $sql = "INSERT INTO User (Nom, email, MotdePasse) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        // L'ordre doit être : Nom, email, MotdePasse
        $hashedMdp = password_hash($mdp, PASSWORD_BCRYPT);
        return $stmt->execute([$nom, $email, $hashedMdp]);
    }

    // --- READ (Lire tout ou un seul) ---
    public function getAll()
    {
        $sql = "SELECT * FROM User";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM User WHERE ID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- UPDATE (Mettre à jour) ---
    public function update($id, $nom, $email)
    {
        $sql = "UPDATE User SET Nom = ?, email = ? WHERE ID = ?";
        $stmt = $this->db->prepare($sql);
        // L'ordre est crucial : Nom (1), email (2), ID (3)
        return $stmt->execute([$nom, $email, $id]);
    }

    // --- DELETE (Supprimer) ---
    public function delete($id)
    {
        $sql = "DELETE FROM User WHERE ID = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}