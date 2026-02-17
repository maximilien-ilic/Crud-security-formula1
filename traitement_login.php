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

    $verif_login = $pdo->prepare('SELECT * FROM utilisateur WHERE nom =:nom AND motdepasse =:motdepasse');
    $verif_login->execute([
        'nom'=> $user,
        'motdepasse' => $hashedmdp,
        ]);   
        echo "$verif_login"; 

    if ($verif_login->rowCount() > 0) {
        echo "$verif_login"; 
        // session_start()
    }
}
