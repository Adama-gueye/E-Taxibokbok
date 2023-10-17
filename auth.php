<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Taxi</title>
</head>
<?php
session_start();
$erreur=[];
include('bd.php');
global $conn;
if (isset($_POST['submit'])) {
    extract($_POST);
    if(empty($email)|| empty($mdp))
        $erreur[]= "Tout les champs sont obligatoires";
     elseif(!(preg_match('/[-0-9a-zA-Z.+_à^]+@[-0-9a-zA-Z.+_]+.[a-z]{2,4}/', $email))) {
        $erreur[]= "Veuillez enregistré un bon mail";
     }else{
        $req = "SELECT * FROM user where email = '$email' and password = '$mdp'";
        $resul = $conn->query($req)->fetch();
        
        if($resul!=null){
            $_SESSION['id'] = $resul['id'];
            $_SESSION['nom'] = $resul['nom'];
            $_SESSION['prenom'] = $resul['prenom'];
            $_SESSION['tel'] = $resul['tel'];
            $_SESSION['email'] = $resul['email'];
            header("location:index.php");
        }
        else  $erreur[]= "Login ou Mot de Passe incorrect !";
    }
}
     
if(isset($_POST['inscription'])){
    extract($_POST);
    if(empty($email)|| empty($mdp)|| empty($nom)||empty($prenom)||empty($tel))
        $erreur[]= "Tout les champs sont obligatoires";
    elseif(!(preg_match('/[-0-9a-zA-Z.+_à^]+@[-0-9a-zA-Z.+_]+.[a-z]{2,4}/', $email))) {
        $erreur[]= "Veuillez enregistré un bon mail";
    }elseif((!(preg_match("/^[77|78|76|75]+[0-9]/", $tel)) || strlen($tel)>13 || strlen($tel)<8)){
        $erreur[]= "Veuillez enregistré un numéro de téléphone valide";
    }elseif((!(preg_match('/[a-zA-Z]$/', $nom)))||(!(preg_match('/[a-zA-Z]/', $prenom)))){
        $erreur[]= "Une erreur s'est produite sur la saisie de votre nom ou de votre prénom";
    }
    else{
        $req = "INSERT INTO user(id,nom,prenom,email,password,tel) VALUES (NULL,'$nom','$prenom','$email','$mdp','$tel')";
        $resul = $conn->exec($req);
        echo 'Votre inscription a été bien passer';
    }
}
  
  

echo implode(". ",$erreur);
?>
<body>
    <div class="container">
        <div class="gauche">
            <form action="" id="form1" method="post">
                <p id="p1"><h4>Authentification</h4> <br> Votre chauffeur en un clic</p><br>
                <a id="button2" href=""><b>S'inscrire</b></a>
                <p>------------------------------------OU------------------------------------</p>
                <label for="">Email</label><br>
                <input type="text" placeholder="Adresse e-mail ou numéro de tél" name="email"><br>
                <label for="">Mot de Passe</label><br>
                <input type="password" placeholder="Mot de passe" name="mdp"><br>
                <div class="container2">
                    <div>
                        <p>j'ai déjà un compte</p>
                    </div>
                    <div>
                        <button id="button1" type="submit" name="submit"><b>Connexion ➡</b></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="droite">
            <form action="" id="form2" method="post">
                <p id="p1"><h4>inscription</h4> <br> Veuillez-vous s'inscrire en rensignant les informations suivantes</p><br>
                <div class="container2">
                    <div>
                        <label for="">Prénom</label><br>
                        <input type="text" placeholder="prenom" name="prenom" <?php if($erreur!=[]){?> value="<?=$_POST["prenom"]?>"<?php }?>>
                    </div>
                    <div style="margin-left: 60px;">
                        <label for="">Nom</label><br>
                        <input type="text" placeholder="nom" name="nom" <?php if($erreur!=[]){?> value="<?=$_POST["nom"]?>"<?php }?>>
                    </div>
                </div>
                <label for="">Téléphone</label><br>
                <input type="text" placeholder="+221 77 500 31 08" name="tel" <?php if($erreur!=[]){?> value="<?=$_POST["tel"]?>"<?php }?>><br>
                <label for="">Email</label><br>
                <input type="text" placeholder="Adresse e-mail" name="email" <?php if($erreur!=[]){?> value="<?=$_POST["email"]?>"<?php }?>><br>
                <label for="">Mot de Passe</label><br>
                <input type="password" placeholder="Mot de passe" name="mdp" <?php if($erreur!=[]){?> value="<?=$_POST["mdp"]?>"<?php }?>><br>
                <button id="button1" name="inscription" type="submit"><b>S'inscrire ➡</b></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
