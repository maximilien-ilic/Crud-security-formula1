<?php

session_start();

if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token_article_add'])  {

    die('Erreur : token ivalide');
    header('Location: formule1.php');
}

unset($_SESSION['token_article_add']);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=formule1','root','');
    }catch (PDOException $e){
         die('Erreur : '. $e->getMessage());
    }

function slug($texte) {
    $texte = strtolower($texte);
    $texte = iconv('UTF-8', 'ASCII//TRANSLIT', $texte);
    $texte = preg_replace('/[^a-z0-9]+/', '-', $texte);
    $texte = trim($texte, '-');
    return $texte;
}

class pilote {


    public function supprimer($pdo,$id) {
        $supprimer = $pdo->prepare('DELETE FROM pilote WHERE id = :id');
        $supprimer->execute(['id'=> $id,]);   
    }
    
    public function modifier($pdo, $id, $data) {
        $modifier = $pdo->prepare('UPDATE pilote SET nom=:nom, age=:age, écurie=:ecurie, podium=:podium, circuit_favoris=:circuit_favoris, slug=:slug WHERE id=:id');
        $modifier->execute([
            'nom'             => $data['nom'],
            'age'             => $data['age'],
            'ecurie'          => $data['ecurie'],
            'podium'          => $data['podium'],
            'circuit_favoris' => $data['circuit_favoris'],
            'slug'            => slug($data['nom']),
            'id'              => $id,
        ]);
    }

    public function ajouter($pdo, $id, $data){
        $ajouter = $pdo->prepare('INSERT INTO pilote (nom, age, écurie, podium, circuit_favoris, slug) VALUES (:nom, :age, :ecurie, :podium, :circuit_favoris, :slug)');
        $ajouter->execute([
            'nom'             => $data['nom'],
            'age'             => $data['age'],
            'ecurie'          => $data['ecurie'],
            'podium'          => $data['podium'],
            'circuit_favoris' => $data['circuit_favoris'],
            'slug'            => slug($data['nom']),
        ]);
    }



}

if (isset($_POST['action']) && $_POST['action'] === 'modifier') {
    $data = [
        'nom'             => $_POST['nom'],
        'age'             => $_POST['age'],
        'ecurie'          => $_POST['ecurie'],
        'podium'          => $_POST['podium'],
        'circuit_favoris' => $_POST['circuit'], 
    ];

    $pilote = new Pilote();
    $pilote->modifier($pdo, $_POST['id'], $data);
    header('Location: formule1.php');
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'supprimer') {
    $pilote = new Pilote();
    $pilote->supprimer($pdo, $_POST['id']);
    header('Location: formule1.php');
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'ajouter') {
    $data = [
        'nom'             => $_POST['nom'],
        'age'             => $_POST['age'],
        'ecurie'          => $_POST['ecurie'],
        'podium'          => $_POST['podium'],
        'circuit_favoris' => $_POST['circuit'], 
    ];
    $pilote = new Pilote();
    $pilote->ajouter($pdo, $_POST['id'],$data);
    header('Location: formule1.php');
    exit;
}

