<?php
session_start();

if(isset($_POST['com']))
{
    $connexion = mysqli_connect("localhost","root","","discussion");
    $requete = "INSERT INTO `discussion`.`commentaire` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '".$_POST['msg']."', '".$_SESSION['id']."', NOW());";
    mysqli_query($connexion,$requete);
    
    //header("Location: index.php");
}



?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>livre-or</title>
  <link rel="stylesheet" href="css/style.css">

</head>


<body>


<?php include("header.php"); ?>

<main class="BG4">

<section class ="BG">

<form class action="livre-or.php" method="post">

        <textarea name="msg" placeholder="votre commentaire">

        </textarea>
        <input class="BG2" type="submit" name="com">

    </form>
  <section>

    <section>
    <table id="AD">
        <thead>
    <tr>
        <th>Commentaire</th>
        <th>Prenom</th>
        <th>Date</th>
        
       
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 

      $connexion = mysqli_connect("localhost","root","","discussion");
      //$requete2 = "SELECT login FROM utilisateurs INNER JOIN commentaire ON utilisateurs.id = commentaire.utilisateur_id";
      $requete2 ="SELECT com.commentaire, com.date, u.login FROM commentaire as com inner join utilisateurs as u on u.id = com.id_utilisateur";
      $query = mysqli_query($connexion, $requete2);
      $resultat = mysqli_fetch_all($query);
      

     
    
    foreach ($resultat as list($com,$date,$login))
    {
        echo "<tr><td>".$com."</td><td>".$login."</td><td>".$date."</td></tr>";
    }
    ?>
    </table>
    </section>
    </main>
    
    
    <?php include("footer.php"); ?>
   
</body>
</html>