<?php
class Database {
    // Les identifiants pour se connecter à ta base XAMPP
    private $host = "localhost";
    private $db_name = "revieweo";
    private $username = "root";
    private $password = ""; // Vide par défaut sur XAMPP
    public $conn;

    // La méthode qui va créer le pont entre le site et la base
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4", $this->username, $this->password);

            // Ça permet d'afficher les erreurs SQL en PHP, indispensable pour débugger !
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>