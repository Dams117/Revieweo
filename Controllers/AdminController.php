<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Critique.php';

class AdminController {
    private User $userModel;
    private Critique $critiqueModel;

    public function __construct() {
        // Sécurité : On vérifie que la session est admin (role 2)
        if (!isset($_SESSION['role']) || $_SESSION['role'] < 2) {
            header('Location: login.php');
            exit;
        }
        $this->userModel = new User();
        $this->critiqueModel = new Critique();
    }

    public function dashboard() {
        return [
            'users' => $this->userModel->getAll(),
            'critiques' => $this->critiqueModel->getAll()
        ];
    }
}