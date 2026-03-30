<?php
require_once __DIR__ . '/../config/Database.php';

class User {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function register($pseudo, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO `User` (pseudo, email, password, role) VALUES (?, ?, ?, 0)");
        return $stmt->execute([$pseudo, $email, $hash]);
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM `User` WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM `User`")->fetchAll();
    }

    public function updateRole($id, $role) {
        $stmt = $this->db->prepare("UPDATE `User` SET role = ? WHERE id = ?");
        return $stmt->execute([$role, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM `User` WHERE id = ?");
        return $stmt->execute([$id]);
    }
}