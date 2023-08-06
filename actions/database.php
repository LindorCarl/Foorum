<?php 
    try{
        $bdd = new pdo("mysql:host=localhost;dbname=forum;charset=utf8", "root", "root");
    }catch(Exception $e){
        die("Une erreur a été trouvée : " . $e->getmessage());
    }
?>