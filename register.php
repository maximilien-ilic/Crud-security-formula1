<?php include ("header.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="traitement_register.php" method="post" >
        <input type="hidden" name="token" value="<?= $_SESSION['token_article_add'];?>">
        <label for="user">Nom utilisateur</label>
        <input type="text" name="user" id="user">
        <br>
        <label for="mdp">Motdepasse</label>
        <input type="password" name="mdp" id="mdp">
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php">se connecter</a>

</body>
</html>