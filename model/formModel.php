<?php

function addArticle(PDO $db, $ime, $prezime, $email, $poruka): bool
{

    $name = $ime;
    $lastName = $prezime;
    $mail = $email;
    $message = $poruka;

    if (empty($ime)) {
        return false;
    }

    $sql = "INSERT INTO `messages`  
    (`Nom`,`Prenom`,`Email`,`message`)
        VALUES 
        (?,?,?,?)";

    $request = $db->prepare($sql);
    try {
        $request->execute([$name, $lastName, $mail, $message]);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }

}

