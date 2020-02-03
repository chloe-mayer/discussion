<?php
session_start();

if(isset($_POST['mes']))
{
    $connexion = mysqli_connect("localhost","root","","discussion");
    $requete = "INSERT INTO `discussion`.`messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES (NULL, '".$_POST['msg']."', '".$_SESSION['id']."', NOW());";
    mysqli_query($connexion,$requete);
    
    //header("Location: index.php");
}



?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>discussion</title>
  <link rel="stylesheet" href="css/style.css">

</head>


<body>


<?php include("header.php"); ?>

<main class="BG4">

<section class ="BG">

<form class action="discussion.php" method="post">

        <textarea name="msg" placeholder="votre commentaire">

        </textarea>
        <input class="BG2" type="submit" name="mes">

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
      $requete2 ="SELECT mes.message, mes.date, u.login FROM messages as mes inner join utilisateurs as u on u.id = mes.id_utilisateur";
      $query = mysqli_query($connexion, $requete2);
      $resultat = mysqli_fetch_all($query);
      

     
    
    foreach ($resultat as list($mes,$date,$login))
    {
        echo "<tr><td>".$mes."</td><td>".$login."</td><td>".$date."</td></tr>";
    }
    ?>
    </table>
    </section>
    </main>
    
    
    <?php include("footer.php"); ?>
   
</body>
</html>