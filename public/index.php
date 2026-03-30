<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/CritiqueController.php';
require_once __DIR__ . '/../Controllers/AdminController.php';

// --- CORRECTIF DE TRAJET ROBUSTE ---
// Récupère le chemin du script (ex: /revieweo/public/index.php)
$scriptName = $_SERVER['SCRIPT_NAME'];
// Récupère l'URL demandée (ex: /revieweo/public/login)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// On retire le nom du fichier ET le dossier parent pour ne garder que la route
$basePath = str_replace('/index.php', '', $scriptName);
$uri = str_replace($basePath, '', $requestUri);

// On s'assure que ça commence par / et qu'on ne finit pas avec "index.php" dans l'URI
$uri = str_replace('/index.php', '', $uri);
if ($uri === '' || $uri === '//') { $uri = '/'; }
// --- FIN DU CORRECTIF ---

$method = $_SERVER['REQUEST_METHOD'];

// Préparation des Regex
$isAdminRole = preg_match('#^/admin/user/(\d+)/role$#', $uri, $mRole);
$isEpingle   = preg_match('#^/admin/critique/(\d+)/epingle$#', $uri, $mEpingle);

try {
    match(true) {
        // ACCUEIL
        $uri === '/' => (function() {
            $ctrl = new CritiqueController();
            $critiques = $ctrl->index();
            require __DIR__ . '/../views/home.php';
        })(),

        // AUTHENTIFICATION
        $uri === '/login' => (function() {
            $ctrl = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ctrl->login($_POST['email'] ?? '', $_POST['password'] ?? '');
            }
            require __DIR__ . '/../views/login.php';
        })(),

        $uri === '/register' => (function() {
            $ctrl = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ctrl->register($_POST['pseudo'] ?? '', $_POST['email'] ?? '', $_POST['password'] ?? '');
            }
            require __DIR__ . '/../views/register.php';
        })(),

        $uri === '/logout' => (function() {
            session_destroy();
            // Utilise un chemin relatif pour éviter de sortir du projet
            header('Location: ./login');
            exit;
        })(),

        // ADMIN
        $uri === '/admin' => (function() {
            $ctrl = new AdminController();
            $data = $ctrl->dashboard();
            require __DIR__ . '/../views/admin.php';
        })(),

        // ROUTES DYNAMIQUES
        (bool)$isAdminRole => (function($m) {
            $ctrl = new AdminController();
            $ctrl->updateUserRole((int)$m[1], (int)($_POST['role'] ?? 0));
        })($mRole),

        (bool)$isEpingle => (function($m) {
            $ctrl = new AdminController();
            $ctrl->epingler((int)$m[1]);
        })($mEpingle),

        // 404
        default => (function() use ($uri) {
            http_response_code(404);
            echo "<h1>404 - Page non trouvée</h1>";
            echo "<p>La route demandée était : <strong>" . htmlspecialchars($uri) . "</strong></p>";
        })(),
    };
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}