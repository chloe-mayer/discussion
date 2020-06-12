<?php
session_start();


$connexion = mysqli_connect("localhost", "root", "", "discussion");
$login = $_SESSION['login'];
$requete = "SELECT * FROM utilisateurs WHERE login =\"$login\"";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);




if (!isset($_SESSION['login'])) {
    echo "erreur";
    header("Location: connexion.php");
    echo "pas encore inscris";
} else {
}


if (isset($_POST["modifp"])) {
    $pass = $_POST['mdp'];
    $pass2 = $_POST['mdp2'];
    if ($pass == $pass2) {
        $mdpv2 = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 12));
        $requete = "UPDATE discussion.utilisateurs SET password =\"$mdpv2\" WHERE utilisateurs.login = \"$login\"";
        var_dump($requete);
        $query = mysqli_query($connexion, $requete);
    }


    echo "votre password a bien été modifier";
}



if (isset($_POST["modifl"])) {
    $login2 = $_POST['login'];


    $requete = "UPDATE discussion.utilisateurs SET login =\"$login2\" WHERE utilisateurs.login = \"$login\"";
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
    <title>Profil</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Krub&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300&display=swap" rel="stylesheet">
</head>

<body>

    <?php include("header.php"); ?>

    <main>

        <h2 id="modifinfo">Bienvenue dans votre espace <?php echo $login; ?></h2>

        <form class="formulaire" method="post" action="profil.php">

            <article>
                <div>
                    <h1 id="titrepro">Modifier vos infos</h1>
                </div>
            </article>

            <section id="blockinfo">

                <form class="formco" method="post" action="connexion.php">

                    <article>

                        <div class="plop">
                            <h2>Modifier votre login:</h2>
                            <input type="text" class="input" required name="login" value="<?php echo $login; ?>">
                        </div>

                        <div class="plop">
                            <h2>Modifier votre mot de passe:</h2>
                            <input type="text" class="input" required name="mdp" placeholder="">
                        </div>


                        <div class="plop">
                            <h2>Confirmer votre mot de passe:</h2>
                            <input type="text" class="input" required name="mdp2" placeholder="">
                        </div>

                    </article>

                    <article id="klopa">

                        <input class="input" type="submit" name="modifp" value="Envoyer">

                    </article>

                </form>

            </section>

    </main>

</body>


<?php include("footer.php"); ?>

</html>