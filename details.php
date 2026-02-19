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
    <title>details</title>
</head>
<body>
    <p><?= htmlspecialchars($pilote['nom']) ?></p>
    <p><?= htmlspecialchars($pilote['age']) ?></p>
    <p><?= htmlspecialchars($pilote['écurie']) ?></p>
    <p><?= htmlspecialchars($pilote['podium']) ?></p>
    <p><?= htmlspecialchars($pilote['circuit_favoris']) ?></p>
    <a href="formule1.php">retour</a>
</body>
</html>