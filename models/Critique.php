<?php
require_once __DIR__ . '/../config/Database.php';

class Critique {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        // Cette requête récupère la critique, le pseudo de l'auteur et compte les likes
        return $this->db->query("
            SELECT c.*, u.pseudo, 
            (SELECT COUNT(*) FROM `Like` WHERE id_critique = c.id) as nb_likes
            FROM `Critique` c
            JOIN `User` u ON c.id_user = u.id
            ORDER BY c.epingle DESC, c.date_creation DESC
        ")->fetchAll();
    }

    public function create($titre, $contenu, $note, $id_user) {
        $stmt = $this->db->prepare("INSERT INTO `Critique` (titre, contenu, note, date_creation, id_user) VALUES (?, ?, ?, NOW(), ?)");
        return $stmt->execute([$titre, $contenu, $note, $id_user]);
    }

    public function toggleEpingle($id) {
        $stmt = $this->db->prepare("UPDATE `Critique` SET epingle = NOT epingle WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM `Critique` WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function toggleLike(int $userId, int $critiqueId): array {
    // 1. On vérifie si le like existe déjà
    $stmt = $this->db->prepare("SELECT * FROM `Like` WHERE id_user = ? AND id_critique = ?");
    $stmt->execute([$userId, $critiqueId]);
    $existingLike = $stmt->fetch();

    if ($existingLike) {
        // 2. Si il existe, on le supprime (Unlike)
        $stmt = $this->db->prepare("DELETE FROM `Like` WHERE id_user = ? AND id_critique = ?");
        $stmt->execute([$userId, $critiqueId]);
        $action = 'unliked';
    } else {
        // 3. S'il n'existe pas, on l'ajoute (Like)
        $stmt = $this->db->prepare("INSERT INTO `Like` (id_user, id_critique) VALUES (?, ?)");
        $stmt->execute([$userId, $critiqueId]);
        $action = 'liked';
    }

    // 4. On compte le nouveau total de likes pour mettre à jour l'affichage
    $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM `Like` WHERE id_critique = ?");
    $stmt->execute([$critiqueId]);
    $count = $stmt->fetch()['count'];

    return ['status' => 'success', 'action' => $action, 'count' => $count];
}
}