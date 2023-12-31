<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/myQuestionsAction.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Afficher les questions de l'utilisateur -->
    <br>
    <div class="container" style="width: 50%">
        <h4>
            <i class="fa-solid fa-circle-question"></i>
            Mes questions
        </h4>
        <br>

        <?php foreach($getAllMyQuestions as $question): ?>
            <div class="card">
                <h5 class="card-header">
                    <a href="article.php?id=<?= $question['id']; ?>">
                        <?= $question['titre']; ?>
                    </a> 
                </h5>
                <div class="card-body">
                    <p class="card-text">
                        <?= $question['description']; ?>
                    </p>
                    <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Accéder à la question</a>
                    <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                </div>
            </div>
            <br>
        <?php endforeach; ?>      
    </div>

</body>
</html>

