<?php
session_start();
require_once __DIR__ . '/../../models/Critique.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Non connecté']); exit;
}

$data       = json_decode(file_get_contents('php://input'), true);
$critiqueId = (int)($data['critique_id'] ?? 0);

if (!$critiqueId) {
    echo json_encode(['error' => 'ID invalide']); exit;
}

$model  = new Critique();
$result = $model->toggleLike($_SESSION['user_id'], $critiqueId);
echo json_encode($result);