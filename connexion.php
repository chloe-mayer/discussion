<?php
session_start();

if (isset($_POST["submit"])) {
  $connexion = mysqli_connect("localhost", "root","", "discussion");
  $login = $_POST["login"];
  $password = $_POST["password"];
  $requete2 = "SELECT * FROM utilisateurs WHERE login = '" . $login . "'";
  $query = mysqli_query($connexion, $requete2);
  $resultat = mysqli_fetch_row($query);

  

  if (password_verify($_POST['password'], $resultat[2])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['id'] = $resultat[0];
    
    header("location:profil.php");
    
  }
  
  else {
    echo "<h2>Mauvais password Saisir a nouveau</h2>";
  }
}
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
        <h1 id="titreins">Connexion</h1>
      </div>
    </article>

    <section id="blockco">

      <form class="formco" method="post" action="connexion.php">

        <h2>Pseudo</h2>
        <input type="text" value="login" name="login" required>
        <h2>Mot de passe</h2>
        <input type="password" value="password" name="password" required>
        <br>
        <input class="buttonindex" type="submit" value="Connexion" name="submit">

      </form>
       
    </section>

  </main>
  
  <?php include("footer.php"); ?>
</body>

</html>