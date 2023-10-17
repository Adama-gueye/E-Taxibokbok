<?php
session_start();
if (empty($_SESSION)) {
    header("location: auth.php");
}

if (isset($_GET['deconnexion'])) {
    session_unset();
    header("location: auth.php");
}
?>

<div>
    <div>
        <h3>Bienvenue <?php
          echo( $_SESSION['prenom'] . ' ' . $_SESSION['nom']. ' ' . $_SESSION['email']. ' ' . $_SESSION['tel']);
           ?></h3>
        <a href="?deconnexion" class=" btn btn-danger offset-6">Se déconnecter</a>
    </div>