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
    <title><?= htmlspecialchars($pilote['nom']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="details-wrapper">


        <h1 class="details-nom"><?= htmlspecialchars($pilote['nom']) ?></h1>
        <div class="details-line"></div>

        <div class="details-grid">
            <div class="details-card">
                <span class="details-label">Âge</span>
                <span class="details-value"><?= htmlspecialchars($pilote['age']) ?></span>
            </div>
            <div class="details-card">
                <span class="details-label">Écurie</span>
                <span class="details-value"><?= htmlspecialchars($pilote['écurie']) ?></span>
            </div>
            <div class="details-card">
                <span class="details-label">Podiums</span>
                <span class="details-value"><?= htmlspecialchars($pilote['podium']) ?></span>
            </div>
            <div class="details-card">
                <span class="details-label">Circuit favori</span>
                <span class="details-value"><?= htmlspecialchars($pilote['circuit_favoris']) ?></span>
            </div>
        </div>

    </div>

    <a href="formule1.php" class=" btn margin">Retour</a>

</body>
</html>