<?php
    session_start();
    require('actions/database.php');

    // Validation du formulaire.
    if(isset($_POST["validate"])){

        // Vérifier si l'utilisateur a bien complété tous les champs.
        if(!empty($_POST["pseudo"]) AND !empty($_POST["password"])){

            // Les données de l'utilisateur.
            $user_pseudo = htmlspecialchars(($_POST["pseudo"]));
            $user_password = htmlspecialchars(($_POST["password"]));

            // Vérifier si l'utilisateur existe (si le pseudo est correct).
            $checkIfUserExists = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
            $checkIfUserExists->execute(array($user_pseudo));

            if($checkIfUserExists->rowCount() > 0){

                // Récupérer les données de l'utilisateur.
                $usersInfos = $checkIfUserExists->fetch();

                // Vérifier si le mot de passe est correct.
                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales "session".
                if(password_verify($user_password, $usersInfos['mdp'])){
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $usersInfos['id'];
                    $_SESSION['lastname'] = $usersInfos['nom'];
                    $_SESSION['firstname'] = $usersInfos['prenom'];
                    $_SESSION['pseudo'] = $usersInfos['pseudo'];

                    // Rediriger l'utilisateur vers la page d'accueil.
                    header("Location: index.php");

                }else{
                    $errorMsg = "Votre mot de passe est incorrect.";
                }

            }else{
                $errorMsg = "Votre pseudo est incorrect.";
            }
        }else{
            $errorMsg = "Veuillez compléter tous les champs.";
        }
    }
?>
