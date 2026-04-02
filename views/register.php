<?php
require_once '../models/User.php'; 
session_start();

$userModel = new User(); 
$message = ""; // Initialisation pour éviter l'erreur "Undefined"

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($userModel->register($pseudo, $email, $password)) {
        header("Location: login.php?success=1");
        exit();
    } else {
        // On stocke le texte dans $message pour qu'il corresponde à ton echo plus bas
        $message = "Ce compte ou cet email existe déjà !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription - SCENEVIEW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #14181c; color: white; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; font-family: sans-serif; }
        .register-card { background: #2c3440; padding: 40px; border-radius: 12px; width: 100%; max-width: 450px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .form-control { background-color: #445566; border: 1px solid #445566; color: white; margin-bottom: 15px; }
        .form-control:focus { background-color: #556677; color: white; border-color: #00bb02; box-shadow: none; }
        .btn-register { background-color: #00bb02; border: none; font-weight: bold; padding: 12px; }
        .btn-register:hover { background-color: #008f1a; }
        /* Style pour l'alerte d'erreur */
        .alert-custom { background-color: rgba(255, 68, 68, 0.2); border: 1px solid #ff4444; color: #ff4444; padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 20px; font-size: 0.9rem; }
    </style>
</head>
<body>

<div class="register-card">
    <h2 class="text-center mb-4">JOIN SCENEVIEW</h2>
    
    <!-- Affichage sécurisé du message -->
    <?php if (!empty($message)): ?>
        <div class="alert-custom">
            ⚠️ <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action=""> 
        <div class="mb-3">
            <label class="small text-white-50 text-uppercase fw-bold">Username</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Nom d'utilisateur" required>
        </div>
        <div class="mb-3">
            <label class="small text-white-50 text-uppercase fw-bold">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email@exemple.com" required>
        </div>
        <div class="mb-3">
            <label class="small text-white-50 text-uppercase fw-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-register">CREATE ACCOUNT</button>
    </form>

    <div class="text-center mt-4">
        <a href="login.php" class="text-white-50 text-decoration-none small">ALREADY HAVE AN ACCOUNT? SIGN IN</a><br>
        <a href="../front/index.php" class="text-white-50 text-decoration-none small">← BACK TO HOME</a>
    </div>
</div>

</body>
</html>