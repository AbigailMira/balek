<?php

/* 
 * requete pour sélectionner tout le linge et afficher une liste
 */


function getLinge() {
    require("db_connect.php");
    
    try 
{
    $linge = $conn->query("SELECT * from linge JOIN taille on linge.fk_taille_linge = taille.idtaille")->fetchAll();
    foreach ($linge as $row)
    {
        echo $row['libelle']."<br />\n";
    }
    
} 
catch (PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}
}

