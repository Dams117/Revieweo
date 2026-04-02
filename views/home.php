

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCENEVIEW - Critiques</title>
    <style>
        /* Adapté au design sombre de Maram */
        body { 
            font-family: 'Graphik', sans-serif; 
            line-height: 1.6; 
            max-width: 900px; 
            margin: auto; 
            padding: 20px; 
            background: #14181c; /* Fond sombre officiel */
            color: white; 
        }
        .critique { 
            background: #2c3440; /* Gris bleuté des cartes */
            padding: 20px; 
            margin-bottom: 20px; 
            border-radius: 8px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.3); 
        }
        .epingle { border: 2px solid #00bb02; } /* Vert au lieu de jaune pour le style Sceneview */
        .tag-epingle { color: #00bb02; font-weight: bold; font-size: 0.8rem; }
        
        nav { 
            background: #1b2228; 
            padding: 15px; 
            border-radius: 8px; 
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }
        nav a { color: #9ab; text-decoration: none; margin-right: 20px; font-weight: bold; transition: 0.3s; }
        nav a:hover { color: white; }
        
        h1 { font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px; border-bottom: 1px solid #445566; padding-bottom: 10px; }
        h2 { color: white; margin-top: 0; }
        hr { border: 0; border-top: 1px solid #445566; margin: 15px 0; }
        small { color: #9ab; }
    </style>
</head>
<body>

<nav>
    <!-- Le lien qui te posait souci est maintenant bien configuré -->
   <a href="../front/index.php" style="color: #ff8000; font-weight: bold; text-transform: uppercase; text-decoration: none;">SCENEVIEW</a>
    
    <?php if(isset($_SESSION['user'])): ?>
        <a href="critique/create">Poster un avis</a>
        
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] >= 2): ?> 
            <a href="admin" style="color: #ffcc00;">Admin</a> 
        <?php endif; ?>
        
        <a href="logout.php" style="margin-left: auto;">Déconnexion (<?= htmlspecialchars($_SESSION['user']['pseudo']) ?>)</a>
        
    <?php else: ?>
        <a href="login.php">Connexion</a>
        <a href="register.php">Inscription</a>
    <?php endif; ?>
</nav>

    <h1>Dernières Critiques</h1>

    <?php if (empty($critiques)): ?>
        <div class="critique">
            <p>Aucune critique n'a été publiée pour le moment. Soyez le premier !</p>
        </div>
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
                <p style="margin-bottom: 0;">❤️ <?= $c['nb_likes'] ?? 0 ?> Likes</p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>