<header>
<?php

if (isset($_SESSION['login']))
 {
?>

<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="planning.php">Planning</a></li>
        <li><a href="reservation-form.php">Réservation</a></li>
    </ul>
</nav>
<?php 

}
else
 {
?>


<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="Inscription.php">Inscription</a></li>
        <li><a href="Connexion.php">Connexion</a></li>
        <li><a href="planning.php">Planning</a></li>
     </ul>
</nav>

<?php
 }
?>
</header>