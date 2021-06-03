<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Palace Cinéma - A l'affiche</title>
</head>

<body>
<h1><a href="accueil.html">Palace Cinéma</a></h1>
    <h2> A l'affiche</h2>

   
    <form action="" method="post">
    <input type="date" id="date" name="date"
       value="YYYY-MM-DD"
       min="1940-01-01" max="2008-12-31">
<input type="submit" name="submit" id="button" value="Afficher">
</form>

<?php
include "connexion.php";

if(!empty($_POST["date"])){
    $val = $_POST["date"];
  

    $req = $dbh->query("SELECT titre FROM film WHERE date_debut_affiche<='$val' AND date_fin_affiche>='$val'");
    $res = $req->fetchAll();
   
    if(!empty($res)){
        foreach($res as $titre){
        echo "<p class='titre'>". ucfirst($titre[0]) . "</p>";
        
        }
        
    } 
    else {
        echo "Aucun résultat";
    }
}
?>

</body>

</html>


