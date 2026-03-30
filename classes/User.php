<?php
class User {
    // Connexion à la base de données et nom de la table
    private $conn;
    private $table_name = "`User`"; 

    // Propriétés de l'objet
    public $id;
    public $pseudo;
    public $email;
    public $password;
    public $role;

    // Le constructeur
    public function __construct($db) {
        $this->conn = $db;
    }

    // ----------------------------------------------------
    // MÉTHODE 1 : INSCRIPTION
    // ----------------------------------------------------
    public function register() {
        $query = "INSERT INTO " . $this->table_name . " (pseudo, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->role = 0; 

        $stmt->bindParam(1, $this->pseudo);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $hashed_password);
        $stmt->bindParam(4, $this->role);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // ----------------------------------------------------
    // MÉTHODE 2 : CONNEXION
    // ----------------------------------------------------
    public function login() {
        $query = "SELECT id, pseudo, password, role FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($this->password, $row['password'])) {
                $this->id = $row['id'];
                $this->pseudo = $row['pseudo'];
                $this->role = $row['role']; 
                return true; 
            }
        }
        return false; 
    }
}
?>