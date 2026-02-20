<?php include ("header.php");?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <?php if(!empty($_SESSION['erreurs'])): ?>
                <div class="erreurs">
                    <?php foreach($_SESSION['erreurs'] as $e): ?>
                        <p class="erreur"><?= $e ?></p>
                    <?php endforeach; ?>
                </div>
                <?php unset($_SESSION['erreurs']); ?>
            <?php endif; ?>                
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
        </div>
    </div>
    <a href="register.php" class="mid btn">Créer un compte</a>
</body>
</html>