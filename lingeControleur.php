<?php
/* 
 * requete pour sélectionner tout le linge et afficher une liste
 */
require_once("db_connect.php");

function getLinge() 
{
    global $conn;
    try 
    {
        $linge = $conn->query("SELECT * from linge JOIN taille on linge.fk_taille_linge = taille.idtaille")->fetchAll();
        return $linge;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les pieces où sont rangés les items de linge
 */
function getPieceForLinge($idlinge) 
{
    global $conn;
    
    try 
    {
        $piece = $conn->query("SELECT libelle_piece FROM rangement JOIN piece JOIN linge on rangement.fk_idpiece_rangement = piece.idpiece and rangement.fk_idlinge_rangement = linge.idlinge WHERE linge.idlinge = $idlinge")->fetch();
        return $piece;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

