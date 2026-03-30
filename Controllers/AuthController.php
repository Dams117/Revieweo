<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register($pseudo, $email, $password) {
        if (!empty($pseudo) && !empty($email) && !empty($password)) {
            $this->userModel->register($pseudo, $email, $password);
            header('Location: /login');
            exit;
        }
    }

    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $user['role'];
            header('Location: /');
            exit;
        }
    }

    public static function requireRole(int $role) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] < $role) {
            header('Location: /login');
            exit;
        }
    }
}