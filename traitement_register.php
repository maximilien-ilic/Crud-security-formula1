<?php

session_start();

if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token_article_add'])  {

    die('Erreur : token ivalide');
    header('Location: register.php');

}

unset($_SESSION['token_article_add']);

$erreurs = [];

if(isset($_POST['user']) && !empty($_POST['user'])) {
    $user = htmlspecialchars($_POST['user']);
} else{
    $erreurs[] = 'Un nom est obligatoire';
}


if(isset($_POST['mdp']) && !empty($_POST['mdp'])) {
    $mdp = $_POST['mdp']; 
    if(strlen($mdp) < 10) {
        $erreurs[] = 'Le mot de passe doit faire au moins 10 caractères';
    }
    if(!preg_match('/[0-9]/', $mdp)) {
        $erreurs[] = 'Le mot de passe doit contenir au moins un chiffre';
    }
    if(!preg_match('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $mdp)) {
        $erreurs[] = 'Le mot de passe doit contenir au moins un symbole';
    }
} else{
    $erreurs[] = 'Le mot de passe est obligatoire';
}


if(!empty($erreurs)) {
    $_SESSION['erreurs'] = $erreurs;
    header('Location: register.php');
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
    header('Location: index.php');

}
