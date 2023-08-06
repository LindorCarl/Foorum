<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="assets/Logo.png" width="150px"  />
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Les questions</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Publier une question</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="my-questions.php">Mes questions</a>
        </li>

        <?php 
          if(isset($_SESSION['auth'])){
            ?>
              <li class="nav-item">
                <a class="nav-link"  href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
              </li>

              <li class="nav-item">
                  <a class="custom-css btn btn-danger" href="actions/users/logoutAction.php">
                    <i class="fa-solid fa-power-off"></i>
                    Déconnexion
                  </a>
              </li>
            <?php
          }else{
            ?>
              <li class="nav-item">
                    <a class="custom-css btn btn-success" href="login.php">
                      Se connecter
                    </a>
              </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>