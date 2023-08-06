<?php
    require("actions/database.php");

    // Validation du formulaire.
    if(isset($_POST["validate"])){

        // Vérifier si les champs sont remplis.
        if(isset($_POST["title"]) AND isset($_POST["description"]) AND isset($_POST["content"])){

            // Les données à faire passer dans la requête.
            $edit_title = htmlspecialchars($_POST["title"]);
            $edit_description = nl2br(htmlspecialchars($_POST["description"]));
            $edit_content = nl2br(htmlspecialchars($_POST["content"]));

            // L'id de la question en paramètre.
            $idOfquestion = $_GET['id'];
            
            // Modifier les informations de la question qui possède l'id rentré en paramètre dans l'URL.
            $insertEditIntoWebsite = $bdd->prepare("UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?");
            $insertEditIntoWebsite->execute(array($edit_title, $edit_description, $edit_content, $idOfquestion));

            // Redirection vers la page d'affichage des questions de l'utilisateur.
            header('Location: my-questions.php');

        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question.";
        }

    }
?>



