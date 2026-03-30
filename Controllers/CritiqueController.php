<?php
require_once __DIR__ . '/../models/Critique.php';

class CritiqueController {
    private Critique $model;

    public function __construct() {
        $this->model = new Critique();
    }

    public function index() {
        return $this->model->getAll();
    }

    public function save() {
        if (!isset($_SESSION['user'])) header('Location: /login');
        
        $titre = $_POST['titre'] ?? '';
        $contenu = $_POST['contenu'] ?? '';
        $note = $_POST['note'] ?? 0;
        $userId = $_SESSION['user']['id'];

        if ($this->model->create($titre, $contenu, $note, $userId)) {
            header('Location: /');
            exit;
        }
    }
}