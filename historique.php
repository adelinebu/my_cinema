<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Palace Cinéma - Historique membre</title>
</head>

<body>

<h1><a href="accueil.html">Palace Cinéma</a></h1>
<h2>Historique du membre</h2>

<div class="recherche">
<form action="" method="POST">
<input type="submit" name="submit" id="button" value="Afficher l'historique du membre">
</form>
</div>

<?php

include "connexion.php";
if (!empty($_GET["id_perso"]))
{
    if (!empty($_POST["submit"]))
    {
    $value = $_GET["id_perso"]; 
    
    foreach($dbh->query("SELECT * FROM film INNER JOIN historique_membre INNER JOIN membre ON membre.id_membre = historique_membre.id_membre WHERE id_fiche_perso LIKE $value AND film.id_film = historique_membre.id_film") as $row){  
         echo "<p class='historique'>". $row['titre'] . "</p>" . "<br>";
     }
    }                
}
?>



<h2>Dernier film vu<h2>

    <div class="recherche">
        <form action="" method="POST">
        <label for="name">Recherche par nom</label>
        <input type="text" name="name" id="input" placeholder="Nom">
        <input type="submit" name="recherche" id="button" value="Ajouter à l'historique du membre">
        </form>
        
    </div>
        

<?php

include "connexion.php";

if(!empty($_POST["name"])){

    $value = $_POST["name"];  
    $dbh;
    foreach($dbh->query("SELECT * from film WHERE titre LIKE '$value'") as $row) {
        
        $id_film = $row['id_film'];
        $titre = $row['titre'];

    }
   
}

if (!empty($_POST["recherche"])){
    
    $id_perso = $_GET["id_perso"];
    $dbh;

    foreach($dbh->query("SELECT id_membre FROM membre WHERE id_fiche_perso=$id_perso")as $row){
        $id_membre = $row['id_membre'];
        
    }
    
    $name = $_POST["name"];
    foreach($dbh->query("SELECT id_film FROM film WHERE titre like '$name'") as $row){
        $id_film = $row['id_film'];
        
    }
   
    $film = $dbh->query("SELECT titre FROM film INNER JOIN historique_membre ON film.id_film=historique_membre.id_film WHERE id_membre=$id_membre AND film.id_film=$id_film");
    

    /*if ($film === false){
        $dbh->exec("INSERT INTO historique_membre (id_membre, id_film, date) VALUES ('$id_membre', '$id_film', NOW()) WHERE id_membre=$id_membre");
        echo "succès";
    }   else {
        echo "erreur";
    } */ 
}
?>

    
</body>

</html>