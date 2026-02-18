<?php
session_start();


if(!isset($_SESSION['token_article_add'])  || empty($_SESSION ['token_article_add'])){
    $_SESSION['token_article_add']=bin2hex(random_bytes(32));
} 
?>

