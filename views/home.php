<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revieweo - Accueil</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: auto; padding: 20px; background: #f4f4f4; }
        .critique { background: white; padding: 15px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .epingle { border: 2px solid #ffcc00; }
        .tag-epingle { color: #d4af37; font-weight: bold; }
        nav { background: #333; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; }
    </style>
</head>
<body>

    <nav>
    <a href="./">Accueil</a>
    
    <?php if(isset($_SESSION['user'])): ?>
        <a href="critique/create">Poster un avis</a>
        
        <?php if($_SESSION['role'] >= 2): ?> 
            <a href="admin" style="color: #ffcc00;">Admin</a> 
        <?php endif; ?>
        
        <a href="logout" style="float:right;">Déconnexion (<?= htmlspecialchars($_SESSION['user']['pseudo']) ?>)</a>
        
    <?php else: ?>
        <a href="login">Connexion</a>
        <a href="register">Inscription</a>
    <?php endif; ?>
</nav>

    <h1>Dernières Critiques</h1>
    <?php if (empty($critiques)): ?>
        <p>Aucune critique n'a été publiée pour le moment. Soyez le premier !</p>
    <?php else: ?>
        <?php foreach($critiques as $c): ?>
            <div class="critique <?= $c['epingle'] ? 'epingle' : '' ?>">
                <?php if($c['epingle']): ?>
                    <span class="tag-epingle">📌 ÉPINGLÉ</span>
                <?php endif; ?>
                
                <h2><?= htmlspecialchars($c['titre']) ?></h2>
                <p><strong>Note : <?= $c['note'] ?>/5</strong></p>
                <p><?= nl2br(htmlspecialchars($c['contenu'])) ?></p>
                <hr>
                <small>Posté par <strong><?= htmlspecialchars($c['pseudo'] ?? 'Anonyme') ?></strong> le <?= $c['date_creation'] ?></small>
                <p>❤️ <?= $c['nb_likes'] ?? 0 ?> Likes</p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>