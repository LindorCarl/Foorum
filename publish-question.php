<?php
    require("actions/users/securityAction.php");
    require("actions/questions/publishQuestionAction.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php" ; ?> 
<body>
    <?php require("includes/navbar.php") ?>
    <br>
    <div class="container" style="width: 40%"> 

        <h4> 
            <i class="fa-solid fa-upload"></i>
            Publier une question 
        </h4>
        <br>

        <form method="POST">
            <!-- Afficher erreur  -->
            <div style="color: red; font-weight: bold;">
                <?php if(isset($errorMsg)){ echo "<p>" .$errorMsg. "</p>"; } ?>
            </div>

            <div style="color: mediumseagreen; font-weight: bold;">
                <?php if(isset($successMsg)){ echo '<p>' .$successMsg. '</p>'; }?>
            </div>
            
            <!-- Input  -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                <textarea class="form-control" name="description"> </textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                <textarea type="text" class="form-control" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Publier la question</button> 
            
        </form>
    </div>
</body>
</html>