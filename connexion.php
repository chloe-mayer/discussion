<?php
session_start();

if (isset($_POST["submit"])) {
  $connexion = mysqli_connect("localhost", "root","", "reservationsalles");
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
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Permanent+Marker&display=swap" rel="stylesheet">
    </head>

<body>
  <?php include("header.php"); ?>

<main>
 
  <div>

  <form method="POST" action="connexion.php">
    
  <p>

    <label>Login</label>
    <input type="text" name="login">

    <label>Password</label>
    <input type="password" name="password">
    </br>
    </p>

    <input type="submit" name="submit">
  
  </form>
  </div>
  </main>
  
  <?php include("footer.php"); ?>
</body>

</html>