

<?php

function addArticle(PDO $db , $ime , $prezime , $email , $poruka):bool|string
{

    $name = $ime;
    $lastName = $prezime;
    $mail = $email;
    $message = $poruka;

    $sql = "INSERT INTO 'user'
    ('ime','prezime', 'email','message')
        VALUES(?,?,?,?)";

    $request = $db->prepare($sql);
    try{
        $request->execute([$name,$lastName,$mail,$message]);
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }

}