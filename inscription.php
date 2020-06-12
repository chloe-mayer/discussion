<?php
session_start();


$connexion = mysqli_connect("localhost", "root", "", "discussion");


if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    /*$prenom = $_POST["prenom"];
    $nom = $_POST["nom"];*/
    $confirmpass = $_POST["confirmpass"];
    $requete2 = "SELECT login FROM utilisateurs WHERE login = \"$login\"";
    $query = mysqli_query($connexion, $requete2);
    $resultat = mysqli_fetch_all($query);




    if (!empty($resultat)) {
?>
        <p>Ce login existe déjà !! </p>

    <?php

    } else if ($password != $confirmpass) {
    ?><p> Mots de passe sont différents.</p><?php
                                        } else {
                                            $mdpv = password_hash($_POST["password"], PASSWORD_BCRYPT, array('cost' => 12));
                                            $requete_inscr = "INSERT INTO utilisateurs (id,login,password) VALUES (NULL,\"$login\",\"$mdpv\");";
                                            $query_inscr = mysqli_query($connexion, $requete_inscr);
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
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Krub&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300&display=swap" rel="stylesheet">
</head>

<body>
    <?php include("header.php"); ?>

    <main>
        <article>
            <div>
                <h1 id="titreins">M'inscrire</h1>
            </div>
        </article>

        <section id="blockins">

            <form class="formins" method="post" action="inscription.php">

                <h2>Pseudo</h2>
                <input type="text" placeholder="Votre pseudo" name="login" required>

                <h2>Mot de passe</h2>
                <input type="password" placeholder="Votre Mot de passe" name="password" required>

                <h2>Confirmation du mot de passe</h2>
                <input type="password" placeholder="Confirmer Votre Mot de passe" name="confirmpass" required>
                <br>
                <input class="buttonindex" type="submit" name="submit">

            </form>

        </section>
    </main>

    <?php include("footer.php"); ?>

</body>

</html>