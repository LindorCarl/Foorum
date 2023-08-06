<?php 
    session_start();
    require('actions/questions/showAllQuestionsAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container" style="width: 60%">

        <!-- Rechercher une question -->
        <form method="GET" >
            <div class="form-group row">
                <div class="col-8" >
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Rechercher
                    </button>
                </div>
            </div>
        </form>

        <br>

        <!-- Afficher la/les question(s) trouvées -->
        <?php
            while ($question = $getAllQuestions->fetch()){
                ?>
                    <div class="card" style="width: 82%">
                        <div class="card-header">
                            <a href="article.php?id=<?= $question['id']; ?>">
                                <h4><?= $question['titre']; ?></h4>
                            </a>
                        </div>
                        <div class="card-body">
                            <?= $question['description']; ?>
                        </div>
                        <div class="card-footer">
                            Publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur']; ?></a> le <?= $question['date_publication']; ?>
                        </div>
                    </div>
                    <br>
                <?php
            }
        ?>
    </div>

</body>
</html>