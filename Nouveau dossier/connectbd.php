<?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=Boutique", "root", "");
}catch(Exception $error){
    die('Une Erreur est survenu : '.$error->getMessage());
}

?>