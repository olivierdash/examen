<?php
    namespace app\Models;

    use Flight;
    use PDO;

class Echanges
{
    private $ID;
    private $IdObjet1;
    private $IdObjet2;
    private $DateEchange;
    private $db;

    public function __construct($ID = null, $IdObjet1 = null, $IdObjet2 = null, $DateEchange = null) {
        $this->ID = $ID;
        $this->IdObjet1 = $IdObjet1;
        $this->IdObjet2 = $IdObjet2;
        $this->DateEchange = $DateEchange;
        $this->db = Flight::db();
    }

    // --- GETTERS & SETTERS ---
    public function getId() { return $this->ID; }
    public function setId($ID) { $this->ID = $ID; return $this; }
    public function getIdObjet1() { return $this->IdObjet1; }
    public function setIdObjet1($IdObjet1) { $this->IdObjet1 = $IdObjet1; return $this; }
    public function getIdObjet2() { return $this->IdObjet2; }
    public function setIdObjet2($IdObjet2) { $this->IdObjet2 = $IdObjet2; return $this; }
    public function getDateEchange() { return $this->DateEchange; }
    public function setDateEchange($DateEchange) { $this->DateEchange = $DateEchange; return $this; }

    // --- MÉTHODES CRUD ---
    /**
     * Récupère tous les échanges
     */
    public static function getAll() {
        $db = Flight::db();
        $stmt = $db->query("SELECT * FROM Echanges");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un échange par son ID
     */
    public static function getById($ID) {
        $db = Flight::db();
        $stmt = $db->prepare("SELECT * FROM Echanges WHERE ID = ?");
        $stmt->execute([$ID]);
        return $stmt->fetchObject(self::class);
    }

    /**
     * Insère ou met à jour l'échange
     */
    public function save() {
        if ($this->ID) {
            // Update
            $stmt = $this->db->prepare("UPDATE Echanges SET IdObjet1 = ?, IdObjet2 = ?, DateEchange = ? WHERE ID = ?");
            return $stmt->execute([$this->IdObjet1, $this->IdObjet2, $this->DateEchange, $this->ID]);
        } else {
            // Create
            $stmt = $this->db->prepare("INSERT INTO Echanges (IdObjet1, IdObjet2, DateEchange) VALUES (?, ?, ?)");
            $res = $stmt->execute([$this->IdObjet1, $this->IdObjet2, $this->DateEchange]);
            $this->ID = $this->db->lastInsertId();
            return $res;
        }
    }

    /**
     * Supprime l'échange
     */
    public function delete() {
        $stmt = $this->db->prepare("DELETE FROM Echanges WHERE ID = ?");
        return $stmt->execute([$this->ID]);
    }

    public function countEchanges() : int {
        $sql = "SELECT COUNT(ID) FROM Echanges";
        $stmt = $this->db->query($sql);
        return (int) $stmt->fetchColumn();
    }
}