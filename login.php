<?php require("actions/users/loginAction.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>

<body>
    <br><br>
    <div class="container" style="width: 40%"> 
        <form method="POST">

            <!-- Afficher erreur  -->
            <div style="color: red; font-weight: bold;">
                <?php if(isset($errorMsg)){ echo "<p>" .$errorMsg. "</p>";} ?>
            </div>

            <!-- Titre et logo  -->
            <div class="d-flex justify-content-sm-center">
                <img src="assets/FOORUM.png" alt="Logo" width ="17%">
            </div>

            <br>
            <h1 class="d-flex justify-content-sm-center fw-bold"> S'identifier </h1>
            <br>

            <!-- Input  -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Se connecter</button> 
            
        </form>
        
        <br>
        <a href="signup.php"> Je n'ai pas de compte, je m'inscris. </a></div>
    </div>
</body>
</html>