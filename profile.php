<?php
    session_start();
    require("actions/users/showOneUsersProfileAction.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>

<body>
    <?php include "includes/navbar.php"; ?>

    <!-- Afficher le profil -->
    <?php 
        if(isset($errorMsg)){ echo $errorMsg; }

        if(isset($getUserQuestion)){
            ?>
                <br>
                <div class="container" style="width: 20%">
                    <div class="card">
                        <div class="card-header">
                                
                            <h4>@<?= $user_pseudo; ?></h4>
                                
                            </div>
                            <div class="card-body">
                                <i class="fa-solid fa-user"></i>
                                <?= $user_lastname; ?> <?= $user_firstname; ?>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div> 

                <br><br>
                <!-- Afficher les questions de ce profil -->
                <div class="container" style= "font-weight:bold; width: 40%">
                    <h4>
                        <i class="fa-regular fa-newspaper"></i>
                        Publication(s) de l'utilisateur
                    </h4>
                    <br>
                </div>
                
                <?php
                    while($answer = $getUserQuestion->fetch()){
                        ?>
                            
                            <div class="container" style="width: 40%">
                            
                                <div class="card">
                                    <div class="card-header">
                                            
                                        <h4><?= $answer["titre"]; ?></h4>
                                            
                                        </div>
                                        <div class="card-body">
                                            <?= $answer["description"]; ?>
                                        </div>

                                        <div class="card-footer" style="color: mediumseagreen; font-weight:bold;">
                                            Par <?= $answer["pseudo_auteur"]; ?> le <?= $answer["date_publication"]; ?>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <br>
                        <?php
                    }
                ?>
            <?php
        }
    ?>

</body>
</html>