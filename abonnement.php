<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Palace Cinéma - Modification Abonnement</title>
</head>

<body>

<h1><a href="accueil.html">Palace Cinéma</a></h1>
<h2> Abonnement </h2>

    <div class="recherche">
        <form action="" method="POST">
            <button id="abo" type="submit" name="suppression">Supprimer l'abonnement</button>
        </form>
    </div>

    <div class="recherche">
        <form action="" method="POST">
        <label for="abo">Merci de sélectionner le nom du nouvel abonnement</label>
        <select name="abo" id="abo">
            <option value="">---</option>
            <option value="1">VIP</option>
            <option value="2">GOLD</option>
            <option value="3">Classic</option>
            <option value="4">pass day</option>
        </select>
        <button class="update" type="submit" name="update">Mettre à jour</button>
        </form>
        
    </div>

<?php
include "connexion.php";

if(!empty($_GET["id_perso"]))
{
    $value = $_GET["id_perso"];
    $req = $dbh->query("SELECT id_abo FROM membre WHERE id_fiche_perso=$value");
    $res = $req->fetch();
    if ($res[0] != 0) {
        try{
            $dbh->exec("UPDATE membre SET id_abo='0' WHERE id_fiche_perso=$value");  
            echo "<p class='update-abo'>Suppression prise en compte, merci</p>";
          }
          catch(Exception $e){
              echo "<p class='update-abo'>Le membre n'a pas d'abonnement à supprimer.</p>";
          }
    }
    
    
}
 

if (!empty($_GET["id_perso"]))
{

    if (!empty($_POST["abo"]))
    {
        $abo = $_POST["abo"];
        $value = $_GET["id_perso"];
    
        $result=$dbh->exec("UPDATE membre SET id_abo=$abo WHERE id_fiche_perso=$value");
        
        if($result<0)
            echo "<p class='update-abo'>L'abonnement n'a pu être modifié.</p>";
        echo "<p class='update-abo'>Abonnement modifié avec succès !</p>";

    }
}

?>

</body>

</html>


