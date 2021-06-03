<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Palace Cinéma - Recherche Membre</title>
</head>

<body>
<h1><a href="accueil.html">Palace Cinéma</a></h1>
    <h2> Recherche d'un membre par nom ou prénom</h2>

    <div class="recherche">
        <form action="membre.php" method="POST">
        <input type="text" name="name" id="input" placeholder="Nom">
        <input type="submit" name="submit" id="button-recherche" value="Rechercher">
        </form>
        
    </div>

    <div class="recherche">
        <form action="membre.php" method="POST">
        <input type="text" name="prenom" id="input" placeholder="Prénom">
        <input type="submit" name="submit" id="button-recherche" value="Rechercher">
        </form>
        
    </div>

<?php

include "connexion.php";


if(!empty($_POST["name"])){

    $value = $_POST["name"];  
    $dbh;
    foreach($dbh->query("SELECT * from fiche_personne WHERE nom LIKE '$value%'") as $row) {

    $ID = $row['id_perso'];
    echo "<p class='membre'>N°ID perso: $ID</p>";   
    echo "<p class='membre'>". strtoupper($row['nom']) . "</p>";
    echo "<p class='membre'>". ucfirst($row['prenom']) . "</p>";
    echo "<p class='membre'>Né(e) le ". $row['date_naissance'] . "</p>";
    echo "<p class='membre'>". $row['email'] . "</p>";
    echo "<p class='membre'>". $row['cpostal'] . ' ' . $row['ville'] . "</p>" . "<br>";?>
    
    <div class="navigation">
        <?php
    echo "<a target='_blank' href='abonnement.php?id_perso=$ID'><button class='aha'>Abonnement</button></a>";
    echo "<a target='_blank' href='historique.php?id_perso=$ID'><button class='aha'>Historique</button></a>";
    echo "<a target='_blank' href='avis.php?id_perso=$ID'><button class='aha'>Avis</button></a>";
    } 
}  
        ?>
    </div>
    


<?php

include "connexion.php";

if(!empty($_POST["prenom"])){

      $value = $_POST["prenom"];  
      $dbh;
      foreach($dbh->query("SELECT * from fiche_personne WHERE prenom LIKE '$value%'") as $row) {

        $ID = $row['id_perso'];
        echo "<p class='membre'>N°ID perso: $ID</p>";   
        echo "<p class='membre'>". strtoupper($row['nom']) . "</p>";
        echo "<p class='membre'>". ucfirst($row['prenom']) . "</p>";
        echo "<p class='membre'>Né(e) le ". $row['date_naissance'] . "</p>";
        echo "<p class='membre'>". $row['email'] . "</p>";
        echo "<p class='membre'>". $row['cpostal'] . ' ' . $row['ville'] . "</p>" . "<br>";?>
    

        <div class="navigation">
        <?php
    echo "<a target='_blank' href='abonnement.php?id_perso=$ID'><button class='aha'>Abonnement</button></a>";
    echo "<a target='_blank' href='historique.php?id_perso=$ID'><button class='aha'>Historique</button></a>";
    echo "<a target='_blank' href='avis.php?id_perso=$ID'><button class='aha'>Avis</button></a>";
    } 
}  
        ?>
    </div>


</body>

</html>