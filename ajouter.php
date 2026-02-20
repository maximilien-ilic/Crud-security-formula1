<?php include ("header.php");?>

<?php
if (!isset($_SESSION['nom'])) {
    header('Location: index.php');
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=formule1','root','');
} catch (PDOException $e) {
    die('Erreur : '. $e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <form action="traitement_formule1.php" method="post">
                <input type="hidden" name="token" value="<?= $_SESSION['token_article_add'];?>">
                <input type="hidden" name="id" value="<?= $pilote['id'] ?>"> 

                <label for="nom">nom</label>
                <input type="text" name="nom" >
                <label for="age">age</label>
                <input type="number" name="age" >
                <label for="ecurie">ecurie</label>
                <input type="text" name="ecurie" >
                <label for="podium">podium</label>
                <input type="number" name="podium" >
                <label for="circuit">circuit favoris</label>
                <input type="text" name="circuit" >    
                <button type="submit" name="action" value="ajouter">Ajouter</button> 
            </form>
        </div>
    </div>
    <a href="formule1.php" class="mid btn">retour</a>
</body>
</html>