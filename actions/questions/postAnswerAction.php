<?php
    require("actions/database.php");

    // Valider le formulaire.
    if(isset($_POST["validate"])){

        //Vérifier si les champs ne sont pas vides.
        if(!empty($_POST["answer"])){

            // Les données de l'utilisateur.
            $user_answer = nl2br(htmlspecialchars($_POST["answer"]));

            // Insérer la réponse sur la bdd.
            $insertAnswer = $bdd->prepare("INSERT INTO answers(id_auteur, pseudo_auteur, id_question, contenu) VALUES (?, ?, ?, ?)");
            $insertAnswer->execute(array($_SESSION["id"], $_SESSION["pseudo"], $_GET["id"], $user_answer)); 

        }
    }

?>

