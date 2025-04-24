<?php


require_once '../config.php';

try{
    $connectPDO = new PDO(DB_DSN, DB_CONNECT_USER, DB_CONNECT_PWD,
        [
            // par défaut les résultats des requêtes sont en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Afficher les exceptions pour les requêtes
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
}catch(Exception $e){
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

if(isset($_POST['ime'],$_POST['prezime'],$_POST['email'],$_POST['message'])){
    $insert = addArticle($connectPDO,$_POST['ime'],$_POST['prezime'],$_POST['email'],$_POST['message']);

    if($insert===true){
        echo "bravo";
    }else{
        echo "not good";
    }
}


require_once '../view/formView.php';