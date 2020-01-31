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
   <main class="accueil">
        <h1>Réservez votre studio son en ligne !</h1>
        <h2><a href="inscription.php">Inscrivez-vous</a> ou <a href="connexion.php">connectez-vous</a> dès maintenant pour accéder à notre service</h2>
    </main>

<?php include("footer.php"); ?>
</body>
</html>


<?php
session_start();
unset($_SESSION);
session_destroy();

?>
