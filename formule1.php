<?php include ("header.php");?>

<?php

if (!isset($_SESSION['nom'])) {
    header('Location: index.php');
    exit;
}
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
    <form action="deconnexion.php" method="post">
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>