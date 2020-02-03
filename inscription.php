<?php
session_start();


$connexion = mysqli_connect("localhost", "root","", "discussion");
    

if(isset($_POST["submit"]))
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $confirmpass = $_POST["confirmpass"];
    $requete2 = "SELECT login FROM utilisateurs WHERE login = \"$login\"";
    $query = mysqli_query($connexion,$requete2);
    $resultat = mysqli_fetch_all($query);
    



    if( !empty($resultat)) 
    {
        ?>
        <p>Le login existe déjà !! </p>
        
        <?php
        
    }

    
    else if ($password!= $confirmpass)
    {
        ?><p> Mots de passe sont différents.</p><?php
    }
    
    else
    {
        $mdpv = password_hash($_POST["password"],PASSWORD_BCRYPT, array('cost' => 12));
        $requete_inscr = "INSERT INTO utilisateurs (id,login,password) VALUES (NULL,\"$login\",\"$mdpv\");";
        $query_inscr = mysqli_query($connexion,$requete_inscr);
        echo "tout est ok";
        header("Location: connexion.php");
        exit();
    }
}



mysqli_close($connexion);

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
 


<h1>Inscription</h1>

<form method ="POST" action = "">

    <table>
        <tr>
                <td align="right">
                            <label for="login">Login :</label>
                </td>
                <td>
                    <input type="text" placeholder = "Votre pseudo" id = "login" name = "login">
                </td>
        </tr>
        <tr>
                <td align="right">
                    <label for="password">Password :</label>
                </td>
                <td>
                    <input type="password"  placeholder = "Votre Mot de passe"  id = "password" name="password">
                </td>
        </tr>
        <tr>
                <td align="right">
                    <label for="password"> confirmer Password :</label>
                </td>
                <td>
                    <input type="password"  placeholder = "Confirmer Votre Mot de passe"  id = "password" name="confirmpass">
                </td>
        </tr>
</br>
        <tr>
                <td align="right">
                </td>
                <td align="center">
</br>
                <input type="submit" name = "submit" >  
                </td>
        </tr>
            
        </table>

</form>

</div>
</main>
<?php include("footer.php"); ?>



</body>
</html>
