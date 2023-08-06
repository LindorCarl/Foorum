<?php

    require('actions/database.php');

    // Vérifier si l'id de la question est rentrée dans l'URL.
    if(isset($_GET["id"]) AND !empty($_GET["id"])){
        
        // Vérifier si la question existe.
        $showOneArticle = $bdd->prepare("SELECT * FROM questions WHERE id = ?");
        $showOneArticle->execute(array($_GET["id"]));

        if($showOneArticle->rowCount() > 0){

            //Récupérer toutes les datas de la questions
            $getInfosOfArticle = $showOneArticle->fetch();

            // Stocker les datas de la question dans des variables propres.
            $question_title = $getInfosOfArticle["titre"];
            $question_description = $getInfosOfArticle["description"];
            $question_content = $getInfosOfArticle["contenu"];
            $question_id_author = $getInfosOfArticle["id_auteur"];
            $question_pseudo_author = $getInfosOfArticle["pseudo_auteur"];
            $question_date = $getInfosOfArticle["date_publication"]; 
        }
    }
?>