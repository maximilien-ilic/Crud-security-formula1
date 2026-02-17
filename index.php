<?php
session_start();


if(!isset($_SESSION['token_article_add'])  || empty($_SESSION ['token_article_add'])){
    $_SESSION['token_article_add']=bin2hex(random_bytes(32));
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="traitement_login.php" method="post" >
        <input type="hidden" name="token" value="<?= $_SESSION['token_article_add'];?>">
        <label for="user">Nom utilisateur</label>
        <input type="text" name="user" id="user">
        <br>
        <label for="mdp">Motdepasse</label>
        <input type="password" name="mdp" id="mdp">
        <br>
        <button type="submit">se connecter</button>
    </form>
</body>
</html>