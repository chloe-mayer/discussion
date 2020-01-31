<?php
session_start();

 
$connexion = mysqli_connect("localhost", "root","", "reservationsalles");
$login = $_SESSION['login'];
$requete = "SELECT * FROM utilisateurs WHERE login =\"$login\"";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);




if(!isset($_SESSION['login']))
{   echo "erreur";
    header("Location: connexion.php");
    echo "pas encore inscris";
}

else
{
    
}


if(isset($_POST["modifp"]))
{ 
$pass = $_POST['mdp'];
$pass2 = $_POST['mdp2'];
    if($pass==$pass2)
    {
        $mdpv2 = password_hash($pass,PASSWORD_BCRYPT, array('cost' => 12));
        $requete = "UPDATE livreor.utilisateurs SET password =\"$mdpv2\" WHERE utilisateurs.login = \"$login\"";
        var_dump($requete);
        $query = mysqli_query($connexion, $requete);
    }


echo "votre password a bien été modifier";


}



if(isset($_POST["modifl"]))
{ 
$login2 = $_POST['login'];


$requete = "UPDATE livreor.utilisateurs SET login =\"$login2\" WHERE utilisateurs.login = \"$login\"";
var_dump($requete);
$query = mysqli_query($connexion, $requete);
$_SESSION['login'] = $login2;
$login = $login2;

echo "votre login a bien été modifier";


}


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Permanent+Marker&display=swap" rel="stylesheet">
    </head>

<body>
    <?php include("header.php"); ?>

<main>

    <h2>Bienvenue dans votre espace <?php echo $login;?></h2>

    <div class="gradient5">
<table>
<thead>
    <tr>
        <th>login</th>
    </tr>
<thead>
    <tbody>
    <tr>
        <td><?php echo $login; ?></td>
    </tr>
    </tbody>
</table>

    </div>

    <div class="gradient5">

    <form class="formulaire" method="post" action="profil.php">

        <h2>Modifier vos info</h2>

        <label for="login">Modifier login:</label>
        <input type="text" minlength="5" required name="login" id="login" value="<?php echo $login; ?>">

        <input type="submit" name="modifl" id="submit" value="Envoyer">

    </form>
       
    <form class="formulaire" method="post" action="profil.php">
        <label for="mdp">Modifier Password:</label>
        <input type="text" minlength="5" required name="mdp" id="mdp" placeholder="">
        
        <label for="mdp2">Confirmer Password:</label>
        <input type="text" minlength="5" required name="mdp2" id="mdp2" placeholder="">
        
        
        <input type="submit" name="modifp" id="submit" value="Envoyer">
</form>
    </div>
</main>
</body>


<?php include("footer.php"); ?>

</html>