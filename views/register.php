<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Revieweo</title>
</head>
<body>
    <h2>Créer un compte</h2>
    
<form method="POST" action="index.php/register">        <input type="text" name="pseudo" placeholder="Pseudo" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br><br>
        <button type="submit">S'inscrire</button>
    </form>
    
    <p><a href="login">Déjà un compte ? Connectez-vous</a></p>
</body>
</html>