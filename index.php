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

<?php
session_start();
include("header.php");?>

    <main>

<?php

if (isset($_SESSION['login']))
 {
?>

        <section>
            <article id="gauche" class="position">
                <p>Quoi de mieux quand on est seul (et/ou peut être atteint d'une tourette) d'avoir une plateforme de discussion sur laquelle se dégourdir les pensées.</p>
            </article>

            <hr>

            <article id="droit" class="position">
                <a id="txt" href="discussion.php">C'est partie !</a>
            </article>  
        </section>


<?php 
}

else
 {
?> 
        <section>
            <article id="gauche" class="position">
                <a id="txt" href="connexion.php">Connexion</a>
            </article>
            <hr>
            <article id="droit" class="position">
                <a id="txt" href="inscription.php">Inscription</a>
            </article>  
        </section>

<?php
 }
?>

    </main>


<?php include("footer.php"); ?>
</body>
</html>


