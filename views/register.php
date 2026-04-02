<?php
// 1. Appel des fichiers nécessaires
require_once '../config/Database.php';
require_once '../models/User.php';

$message = "";

// 2. On vérifie si le formulaire est posté
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // On instancie l'objet User (ton constructeur gère déjà la BDD via getInstance)
    $user = new User();

    // 3. TENTATIVE D'INSERTION 
    // On appelle la méthode register() avec les données du formulaire
    if($user->register($_POST['pseudo'], $_POST['email'], $_POST['password'])) {
        $message = "<div class='alert alert-success'>Utilisateur créé avec succès !</div>";
    } else {
        $message = "<div class='alert alert-danger'>Erreur : impossible de créer le compte (l'email est peut-être déjà utilisé).</div>";
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
    </style>
</head>
<body>

<div class="register-card">
    <h2 class="text-center mb-4">JOIN SCENEVIEW</h2>
    
    <!-- Affichage du message de succès ou d'erreur -->
    <?php echo $message; ?>

    <form method="POST" action=""> 
        <div class="mb-3">
            <label class="small text-white-50">USERNAME</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Nom d'utilisateur" required>
        </div>
        <div class="mb-3">
            <label class="small text-white-50">EMAIL</label>
            <input type="email" name="email" class="form-control" placeholder="email@exemple.com" required>
        </div>
        <div class="mb-3">
            <label class="small text-white-50">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 btn-register">Create Account</button>
    </form>

    <div class="text-center mt-4">
        <a href="login.php" class="text-white-50 text-decoration-none small">SIGN IN</a><br>
        <a href="../front/index.php" class="text-white-50 text-decoration-none small">← Back to home</a>
    </div>
</div>

</body>
</html>