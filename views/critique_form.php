<!DOCTYPE html>
<html>
<head><title>Publier une critique</title></head>
<body>
    <h2>Nouvelle Critique</h2>
    <form method="POST" action="/critique/create">
        <input type="text" name="titre" placeholder="Titre du film/jeu" required><br><br>
        <textarea name="contenu" placeholder="Votre avis..." required></textarea><br><br>
        <label>Note :</label>
        <select name="note">
            <option value="1">1/5</option>
            <option value="2">2/5</option>
            <option value="3">3/5</option>
            <option value="4">4/5</option>
            <option value="5">5/5</option>
        </select><br><br>
        <button type="submit">Publier la critique</button>
    </form>
</body>
</html>