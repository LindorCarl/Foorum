<?php
    session_start();
    require("actions/questions/showArticleContentAction.php");
    require("actions/questions/postAnswerAction.php");
    require("actions/questions/showAllAnswersOfQuestionAction.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php"; ?>

<body>
    <?php include "includes/navbar.php"; ?>

    <!-- Afficher la question  -->
    <?php 
        if(isset($question_date)){
            ?>
                <br>
                <div class="container" style="width: 40%">
                    <div class="card">
                        <div class="card-header">
                                
                            <h4><?= $question_title; ?></h4>
                                
                            </div>
                            <div class="card-body">
                                <?= $question_content; ?> 
                            </div>
                            
                            <div class="card-footer">
                                Publié par <a href="profile.php?id=<?= $question_id_author; ?>"><?= $question_pseudo_author; ?></a> le <?= $question_date; ?> 
                            </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <!-- Répondre à la question  -->
                <?php
                    if(isset($_SESSION["auth"])){
                        ?>
                            <br><br>
                            <div class="container" style="width: 30%">
                                <form class="form-group" method="POST">
                                    <div class="mb-3">
                                        <textarea name="answer" class="form-control" placeholder="Répondre à cette question..."></textarea>
                                        <p></p>
                                        <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                                    </div>
                                </form>
                            </div>
                        <?php
                    }
                ?>

                <!-- Afficher les réponses -->
                <br>
                <div class="container" style="color: mediumseagreen; font-weight:bold; width: 30%">
                    <h4>
                        Réponse(s)
                        <i class="fa-solid fa-comments"></i>
                    </h4>
                </div>

                <?php
                    while($answer = $getUserAnswer->fetch()){
                        ?>
                            <div class="container" style="width: 30%">
                                <div class="card" >
                                    <div class="card-header">
                                            
                                        </div>
                                        <div class="card-body">
                                            <?= $answer["contenu"]; ?> 
                                        </div>
                                        
                                        <div class="card-footer" style="color: mediumseagreen; font-weight:bold;">
                                            Réponse de <?= $answer["pseudo_auteur"]; ?> 
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        <?php
                    }
                ?>
            <?php
        }
    ?>

</body>
</html>