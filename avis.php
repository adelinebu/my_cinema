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
<h2> Ajouter un avis </h2>

    <div>
        <form action="" method="POST">
        <select>
 
        <?php 
        include "connexion.php";

        if (!empty($_GET["id_perso"]))
        {
            if (!empty($_POST["submit"]))
            {
            $value = $_GET["id_perso"]; 
            echo $value;
            
            foreach($bdh->query("SELECT * FROM film INNER JOIN historique_membre INNER JOIN membre ON membre.id_membre = historique_membre.id_membre WHERE id_fiche_perso LIKE $value AND film.id_film = historique_membre.id_film") as $row) {
            echo $row;
            echo "test";
            echo ' <option value="'. $row['titre'].'">'.$row['titre'].'</option>';
            }
         
            }                
        }
        ?>
        </select>
        </form>
            
    </div>

<?php

include "connexion.php";

if (!empty($_POST["avis"])){

    if (!empty($_GET["id_perso"])){
        $id_perso = $_GET["id_perso"];
        $id_membre = $dbh->query("SELECT id_membre FROM membre WHERE id_fiche_perso=$id_perso"); 

    }
    
    $film = $dbh->query("SELECT titre FROM film INNER JOIN historique_membre ON film.id_film=historique_membre.id_film WHERE id_membre=$id_membre AND film.id_film=$id_film");
    
    $avis = $_POST["avis"];
    $req = $dbh->exec("UPDATE historique_membre SET avis='$avis' WHERE id_membre=$id_membre");


}

?>

</body>

</html>

