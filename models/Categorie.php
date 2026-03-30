<?php
require_once __DIR__ . '/../config/Database.php';

class Categorie {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll(): array {
        return $this->db->query('SELECT * FROM Categorie ORDER BY nom')->fetchAll();
    }

    public function getByIdCritique(int $critiqueId): array {
        $stmt = $this->db->prepare(
            'SELECT ca.* FROM Categorie ca
             JOIN Critique_Categorie cc ON ca.id = cc.id_categorie
             WHERE cc.id_critique = ?'
        );
        $stmt->execute([$critiqueId]);
        return $stmt->fetchAll();
    }

    public function create(string $nom): bool {
        $stmt = $this->db->prepare('INSERT INTO Categorie (nom) VALUES (?)');
        return $stmt->execute([$nom]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM Categorie WHERE id = ?');
        return $stmt->execute([$id]);
    }
}