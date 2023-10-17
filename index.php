<?php
session_start();
if(empty($_SESSION))
    header("location:auth.php");
if (isset($_GET['deconnexion'])) {
    session_unset();
    header("location:auth.php");
}
?>
<div>
    <h3>Bienvenue <?php
        echo( $_SESSION['prenom'] . ' ' . $_SESSION['nom'].' '.$_SESSION['tel'].' '.$_SESSION['email']);
        ?></h3>
    <a href="?deconnexion" style="color: danger;">Se déconnecter</a>
</div>