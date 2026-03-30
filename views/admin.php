<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Revieweo</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-delete { color: red; }
    </style>
</head>
<body>
    <h1>Panneau d'Administration</h1>
    <a href="/">Retour à l'accueil</a>

    <h2>Gestion des Utilisateurs</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
        <?php foreach($data['users'] as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['pseudo']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <a href="/admin/user/<?= $user['id'] ?>/delete" onclick="return confirm('Supprimer cet utilisateur ?')" class="btn-delete">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Gestion des Critiques</h2>
    <table>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        <?php foreach($data['critiques'] as $critique): ?>
        <tr>
            <td><?= htmlspecialchars($critique['titre']) ?></td>
            <td><?= htmlspecialchars($critique['pseudo']) ?></td>
            <td><?= $critique['epingle'] ? '📌 Épinglé' : 'Normal' ?></td>
            <td>
                <a href="/admin/critique/<?= $critique['id'] ?>/epingle">
                    <?= $critique['epingle'] ? 'Désépingler' : 'Épingler' ?>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>