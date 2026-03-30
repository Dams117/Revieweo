<?php
class Database {
<<<<<<< HEAD
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
=======
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=localhost;dbname=revieweo;charset=utf8mb4',
                    'root', 
                    '', // Laisse vide pour XAMPP
                    [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                    ]
                );
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
>>>>>>> 7bed7a2 (Fix: Navigation XAMPP et Backend Auth fonctionnel)
