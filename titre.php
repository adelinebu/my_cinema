<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Palace Cinéma - Recherche</title>
</head>

<body>

<h1><a href="accueil.html">Palace Cinéma</a></h1>
<h2> Recherche par titre, genre ou distributeur </h2>
    <div class="recherche">
        <form action="titre.php" method="POST">
        <input type="text" name="name" id="input" placeholder="Nom">
        <input type="submit" name="submit" id="button-recherche" value="Rechercher">
        </form>
        
    </div>

    <div class="recherche">
        <form action="titre.php" method="POST">
        <input type="text" name="genre" id="input" placeholder="Genre">
        <input type="submit" name="submit" id="button-recherche" value="Rechercher">
        </form>
        
    </div>

    <div class="recherche">
        <form action="titre.php" method="POST">
        <input type="text" name="distrib" id="input" placeholder="Distributeur">
        <input type="submit" name="submit" id="button-recherche" value="Rechercher">
        </form>
        
    </div>

    

<?php

include "connexion.php";


if(!empty($_POST["name"])){

    $value = $_POST["name"];  
    $dbh;
    foreach($dbh->query("SELECT * from film WHERE titre LIKE '$value%'") as $row) {
        echo "<p class='titre'>". ucfirst($row['titre']) . "</p>";
        echo "<p>". ucfirst($row['resum']) . "</p>";
        echo "<p>". $row['annee_prod'] . "</p>" . "<br>";

    }
   
}

if(!empty($_POST["genre"])){

      $value = $_POST["genre"];  
      $dbh;
      foreach($dbh->query("SELECT * from film INNER JOIN genre ON film.id_genre = genre.id_genre WHERE nom LIKE '$value%'") as $row) {
        echo "<p class='titre'>". ucfirst($row['titre']) . "</p>";
        echo "<p>". ucfirst($row['resum']) . "</p>";
        echo "<p>". $row['annee_prod'] . "</p>" . "<br>";
      }
     
  }

if(!empty($_POST["distrib"])){

    $value = $_POST["distrib"];  
      $dbh;
      foreach($dbh->query("SELECT * from film INNER JOIN distrib ON film.id_distrib = distrib.id_distrib WHERE nom LIKE '$value%'") as $row) {
        echo "<p class='titre'>". ucfirst($row['titre']) . "</p>";
        echo "<p>". ucfirst($row['resum']) . "</p>";
        echo "<p>". $row['annee_prod'] . "</p>" . "<br>";
      }
     
  }
?>

    <div class="recherche">
        <form action="titre.php" method="POST">
        <input type="text" name="filtre" id="input" placeholder="Recherche par nom, genre, distributeur">
        <input type="submit" name="submit" id="button-recherche" value="Rechercher">
        </form>
        
    </div>

<?php
include "connexion.php";

if(!empty($_POST["filtre"])){

    $value = $_POST["filtre"];  
      $dbh;
      foreach($dbh->query("SELECT * from film WHERE titre LIKE '$value' AND genre LIKE '$value' AND distributeur LIKE '$value'") as $row) {
        echo "<p class='titre'>". ucfirst($row['titre']) . "</p>";
        echo "<p>". ucfirst($row['resum']) . "</p>";
        echo "<p>". $row['annee_prod'] . "</p>" . "<br>";
      }
     
  }

?>

</body>

</html>


