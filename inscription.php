<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Taxi</title>
</head>
<?php
include('bd.php');
global $conn;
if(isset($_POST['submit'])){
    extract($_POST);
    $req = "INSERT INTO user(id,nom,prenom,email,password,tel) VALUES (NULL,'$nom','$prenom','$email','$mdp','$tel')";
    $resul = $conn->exec($req);
    echo '<div class="alert alert-danger text-primary col-md-5 container mt-3">Votre inscription a été bien passer !</div>';
}

?>
<body>
    <div class="container">
        <form action="" id="form1" method="post">
            <p id="p1"><h4>inscription</h4> <br> Veuillez-vous s'inscrire en rensignant les informations suivantes</p><br>
            <div class="container2">
                <div>
                    <label for="">Prénom</label><br>
                    <input type="text" placeholder="prenom" name="prenom">
                </div>
                <div style="margin-left: 60px;">
                    <label for="">Nom</label><br>
                    <input type="text" placeholder="nom" name="nom">
                </div>
            </div>
            <label for="">Téléphone</label><br>
            <input type="text" placeholder="+221 77 500 31 08" name="tel"><br>
            <label for="">Email</label><br>
            <input type="text" placeholder="Adresse e-mail" name="email"><br>
            <label for="">Mot de Passe</label><br>
            <input type="password" placeholder="Mot de passe" name="mdp"><br>
            <button id="button1" name="submit" type="submit"><b>S'inscrire ➡</b></button>
            </div>
        </form>
    </div>
</body>
</html>
