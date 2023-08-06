<?php

    require("actions/database.php");
    
    // Récupérer l'identifiant de l'utilisateur.
    if(isset($_GET["id"]) AND !empty($_GET["id"])){

        // Vérifier si l'utilisateur existe.
        $checkIfUserExists = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $checkIfUserExists->execute(array($_GET["id"]));
    
        if($checkIfUserExists->rowCount() > 0){

            // Récupérer toutes les données de l'utilisateur.
            $dataUser = $checkIfUserExists->fetch();
    
            $user_pseudo = $dataUser["pseudo"];
            $user_lastname = $dataUser["nom"];
            $user_firstname = $dataUser["prenom"];

            // Récupérer toutes les questions publiées par l'utilisateur.
            $getUserQuestion = $bdd->prepare("SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC");
            $getUserQuestion->execute(array($_GET["id"]));
    
        }else{
            $errorMsg = "Aucun utilisateur trouvé.";
        }

    }else{
        $errorMsg = "Aucun utilisateur trouvé.";
    }
?>