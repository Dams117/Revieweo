<?php
session_start();
require_once '../config/Database.php';
require_once '../models/User.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new User();
    
    // On récupère les données du formulaire
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // On utilise la méthode login() de ton modèle User.php
    $userData = $userModel->login($email, $password);

    if ($userData) {
        $_SESSION['user'] = $userData;
        $_SESSION['role'] = $userData['role'] ?? 0;
        
        // Redirection vers la page d'accueil des critiques
        header("Location: home.php");
        exit();
    } else {
        $error = "<div style='color: #ff4444; margin-bottom: 15px;'>Email ou mot de passe incorrect.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion - SCENEVIEW</title>
    <style>
        body { background-color: #14181c; color: white; font-family: sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .card { background: #2c3440; padding: 30px; border-radius: 12px; width: 350px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        input { width: 100%; padding: 10px; margin: 10px 0; background: #445566; border: none; color: white; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #00bb02; border: none; color: white; font-weight: bold; cursor: pointer; border-radius: 5px; margin-top: 10px; }
        a { color: #9ab; text-decoration: none; font-size: 0.8em; }
    </style>
</head>
<body>

<div class="card">
    <h2 style="text-align: center; color: #ff8000;">SIGN IN</h2>
    
    <?= $error ?>

    <form method="POST" action=""> <!-- Action vide = reste sur ce fichier -->
        <label>EMAIL</label>
        <input type="email" name="email" required>
        
        <label>PASSWORD</label>
        <input type="password" name="password" required>
        
        <button type="submit">LOGIN</button>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="register.php">Pas de compte ? S'INSCRIRE</a><br><br>
        <a href="../front/index.php">← Retour à l'accueil</a>
    </div>
</div>

</body>
</html>