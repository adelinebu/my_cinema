<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=cinema', "root", "epitech");
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
