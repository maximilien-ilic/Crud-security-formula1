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
    $mdp = $_POST['mdp']; 
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

    $verif_login = $pdo->prepare('SELECT nom,motdepasse,role FROM utilisateur WHERE nom =:nom');
    $verif_login->execute(['nom'=> $user,]);   
    $utilisateur = $verif_login->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur && password_verify($mdp, $utilisateur['motdepasse'])) {
    $_SESSION['nom'] = $utilisateur['nom'];
    $_SESSION['role'] = $utilisateur['role'];
        header('Location: formule1.php');
        exit;
    } else {
        echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
    }
}

