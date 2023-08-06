<?php
    require("actions/database.php");

    // Récupérer les réponses sur la bdd.
    $getUserAnswer = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
    $getUserAnswer->execute(array($_GET["id"])); 

?>

