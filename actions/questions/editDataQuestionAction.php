<?php

    require("actions/database.php");

    //Vérifier si l'id de la question est bien passé en paramètre dans l'URL.
    if(isset($_GET["id"]) AND !empty($_GET["id"])){

        // L'id de la question en paramètre.
        $idOfTheQuestion = $_GET['id'];

        // Vérifier si la question existe.
        $checkIfQuestionExists = $bdd->prepare("SELECT * FROM questions WHERE id = ? ");
        $checkIfQuestionExists->execute(array($idOfTheQuestion));

        if($checkIfQuestionExists->rowCount() > 0){
            // Récupérer les infos de la question.
            $questionsInfos = $checkIfQuestionExists->fetch();

            if($questionsInfos["id_auteur"] == $_SESSION["id"]){
                // Mettre ces infos dans des variables.
                $question_id = $questionsInfos["id"];
                $question_title = $questionsInfos["titre"];
                $question_description = $questionsInfos["description"];
                $question_content = $questionsInfos["contenu"];
                $question_id_author = $questionsInfos["id_auteur"];
                $question_date = $questionsInfos["date_publication"];

                // Remplacer les balises '<br />' par '' . 
                $question_description = str_replace('<br />', '', $question_description);
                $question_content = str_replace('<br />', '', $question_content);
            }else{
                $errorMsg = "Vous n'êtes pas l'auteur de cette question.";
            }

        }else{
            $errorMsg = "Aucune question n'a été trouvée;";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée;";
    }

?>

