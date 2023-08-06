<?php 
    session_start();
    require('actions/database.php');

    // Validation du formulaire.
    if(isset($_POST["validate"])){

        // Vérifier si l'utilisateur a bien complété tous les champs. 
        if(!empty($_POST["pseudo"]) AND !empty($_POST["lastname"]) AND !empty($_POST["firstname"]) AND !empty($_POST["password"])){
            
            // Les données de l'utilisateur.
            $user_pseudo = htmlspecialchars($_POST["pseudo"]);
            $user_lastname = htmlspecialchars($_POST["lastname"]);
            $user_firstname = htmlspecialchars($_POST["firstname"]);
            $user_mdp = password_hash($_POST["password"], PASSWORD_BCRYPT);

            // Vérifier si l'utilisateur existe déjà. 
            $checkIfUserAlreadyExist= $bdd->prepare("SELECT pseudo FROM users WHERE pseudo=?");
            $checkIfUserAlreadyExist->execute(array($user_pseudo));

            if($checkIfUserAlreadyExist->rowCount() == 0){

                // S'il n'existe pas, insérer l'utilisateur dans la bdd. 
                $insertUserOnWebsite = $bdd->prepare("INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?, ?, ?, ?)");
                $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_mdp)); 

                // Récupérer les infos de l'utilisateur. 
                $getInfosOfThisUser= $bdd->prepare("SELECT id, pseudo, nom, prenom FROM users WHERE pseudo = ? AND nom = ? AND prenom = ?");
                $getInfosOfThisUser->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_mdp)); 

                // Stockage des données de l'utilisateur dans un tableau. 
                $usersInfos = $getInfosOfThisUser->fetch();

                // Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales "session".
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                // Rediriger l'utilisateur vers la page d'accueil. 
                header("Location: login.php");
                
            }else{
                $errorMsg = "L'utilisateur existe déjà sur le site.";
            }

        }else{
            $errorMsg = "Veuillez compléter tous les champs.";
        }
    }
?>
