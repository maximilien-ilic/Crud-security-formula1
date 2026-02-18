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

$slug = $_GET['slug'];
$insert = $pdo->prepare('SELECT * FROM pilote WHERE slug = :slug');
$insert->execute(['slug' => $slug]);
$pilote = $insert->fetch(PDO::FETCH_ASSOC);

if (!$pilote) {
    die('Pilote introuvable.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
</head>
<body>
    <form action="traitement_formule1.php" method="post">
        <input type="hidden" name="token" value="<?= $_SESSION['token_article_add'];?>">
        <input type="hidden" name="id" value="<?= $pilote['id'] ?>"> 

        <label for="nom">nom</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($pilote['nom']) ?>">
        <label for="age">age</label>
        <input type="number" name="age" value="<?= htmlspecialchars($pilote['age']) ?>">
        <label for="ecurie">ecurie</label>
        <input type="text" name="ecurie" value="<?= htmlspecialchars($pilote['écurie']) ?>">
        <label for="podium">podium</label>
        <input type="number" name="podium" value="<?= htmlspecialchars($pilote['podium']) ?>">
        <label for="circuit">circuit favoris</label>
        <input type="text" name="circuit" value="<?= htmlspecialchars($pilote['circuit_favoris']) ?>">    
        <button type="submit" name="action" value="modifier">Modifier</button> 
    </form>
</body>
</html>