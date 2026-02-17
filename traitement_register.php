<?php

session_start();

if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token_article_add'])  {

    die('Erreur : token ivalide');
}

unset($_SESSION['token_article_add']);

$erreurs = [];

if(isset($_POST['user']) && !empty($_POST['user'])) {
    $user = htmlspecialchars($_POST['user']);
} else{
    $erreurs[] = 'Un nom est obligatoire';
}


if(isset($_POST['mdp']) && !empty($_POST['mdp'])) {
    $mdp = htmlspecialchars($_POST['mdp']);
} else{
    $erreurs[] = 'Le mot de passe est obligatoire';
}


if(!empty($erreurs)) {
    foreach($erreurs as $e) echo "<p>$e</p>";
    exit;
}

$hashedmdp = password_hash(password: $mdp, algo:PASSWORD_BCRYPT, options: []);


if(isset($hashedmdp) && isset($user)){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=formule1','root','');
    }catch (PDOException $e){
        die('Erreur : '. $e->getMessage());
    }
     $insert = $pdo->prepare('INSERT INTO utilisateur (nom,motdepasse)VALUES (:nom,:motdepasse)');
     $insert->execute([
        'nom' => $user,
        'motdepasse' => $hashedmdp,
     ]);
    echo '<p> utilisateur ajoute avec succes </p>';
}
