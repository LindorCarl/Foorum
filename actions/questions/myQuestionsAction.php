<?php
    require("actions/database.php");

    // Afficher les questions en fonction de l'identifiant de l'auteur.
    $getAllMyQuestions = $bdd->prepare("SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC ");
    $getAllMyQuestions->execute(array($_SESSION['id']));

?>