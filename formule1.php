<?php include ("header.php");?>

<?php

if (!isset($_SESSION['nom'])) {
    header('Location: index.php');
    exit;
}

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=formule1','root','');
    }catch (PDOException $e){
        die('Erreur : '. $e->getMessage());
    }
     $insert = $pdo->prepare('SELECT * From pilote');
     $insert->execute();
     $pilotes = $insert->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formule1</title>
</head>
<body>
    <?php echo 'Bonjour ' .$_SESSION['nom']. '';?>
    <?php echo 'Bonjour ' .$_SESSION['role']. '';?>
    <form action="deconnexion.php" method="post">
        <button type="submit">Se déconnecter</button>
    </form>
    <table >
        <thead>
            <tr>
                <th>Nom</th>
                <th>Age</th>
                <th>Écurie</th>
                <th>Podium</th>
                <th>Circuit favori</th>
                <?php if($_SESSION['role'] === 'admin'): ?>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pilotes as $pilote): ?>
            <tr>
                <td><?= htmlspecialchars($pilote['nom']) ?></td>
                <td><?= htmlspecialchars($pilote['age']) ?></td>
                <td><?= htmlspecialchars($pilote['écurie']) ?></td>
                <td><?= htmlspecialchars($pilote['podium']) ?></td>
                <td><?= htmlspecialchars($pilote['circuit_favoris']) ?></td>
                <?php if($_SESSION['nom'] == "admin") : ?>
                    <td>
                        <form action="traitement_formule1.php" method="post">
                            <input type="hidden" name="token" value="<?= $_SESSION['token_article_add'];?>">
                            <input type="hidden" name="id" value="<?= $pilote['id'] ?>">
                            <button type="submit" name="action" value="supprimer">Supprimer</button>
                        </form> 
                    </td>
                    <td>
                        <a href="modifier.php?slug=<?= $pilote['slug'] ?>">Modifier</a>
                    </td>                 
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php if($_SESSION['nom'] == "admin") : ?>
        <a href="ajouter.php">ajouter Pilote</a>
    <?php endif; ?>
</body>
</html>

