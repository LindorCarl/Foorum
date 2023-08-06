<?php
    // Démarrer une session prendra un tableau vide comme valeur.
    session_start();
    $_SESSION = [];
    session_destroy();
    header("Location: ../../login.php");
?>