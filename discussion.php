<?php
session_start();
$connexion = mysqli_connect("localhost","root","","discussion");

if(!empty($_POST['msg']))
{
    $connexion = mysqli_connect("localhost","root","","discussion");
    $requete = "INSERT INTO `discussion`.`messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES (NULL, '".$_POST['msg']."', '".$_SESSION['id']."', NOW());";
    mysqli_query($connexion,$requete);
}

else
{
  
  echo "<h1>Meunier tu dors?!?</h1>";
}

        
$connexion = mysqli_connect("localhost","root","","discussion");       
$requete2 ="SELECT mes.message, mes.date, u.login FROM messages as mes inner join utilisateurs as u on u.id = mes.id_utilisateur";
$query = mysqli_query($connexion, $requete2);
$resultat = mysqli_fetch_all($query);
?>




<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Discussion</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Krub&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300&display=swap" rel="stylesheet">

</head>


<body>


<?php include("header.php"); ?>

  <main class="blok">

    <section class ="bloke">

        <h1 id="titrepro">De quoi qu'on pourrait parler ?</h1>

        <form id="messages" action="" method="POST">

            <textarea name="msg" placeholder="Du Grain a Moudre?!?"></textarea>

            <input class="BG2" type="submit" name="mes">

        </form>

    </section>
</br>

    <section class="blokee">

    <table >
        <thead>
    <tr>
        <th class="spacecom">Commentaire</th>
        <th class="spacecom">Prenom</th>
        <th class="spacecom">Date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
    foreach ($resultat as list($mes,$date,$login))
    {
      echo "<tr><td>".$mes."</td><td>".$login."</td><td>".$date."</td></tr>";
    } ?>

 
    </tr>
      </tbody>
    </table>

    </section>

  </main>
    
    
    <?php include("footer.php"); ?>
   
</body>

</html>