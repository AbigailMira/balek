<?php
/* 
 * requete pour sélectionner tout le couchage et afficher une liste
 */
require_once("db_connect.php");

function getCouchage() 
{
    global $conn;
    try 
    {
        $couchage = $conn->query("SELECT * FROM couchage JOIN taille ON couchage.fk_taille_couchage = taille.idtaille")->fetchAll();
        return $couchage;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner toute la literie et afficher une liste
 */
function getLiterie() 
{
    global $conn;
    try 
    {
        $literie = $conn->query("SELECT * FROM literie JOIN taille ON literie.fk_taille_literie = taille.idtaille")->fetchAll();
        return $couchage;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner toute la literie et afficher une liste
 */
function getLiterieForCouchage() 
{
    global $conn;
    try 
    {
        $literie_couchage = $conn->query("SELECT 
	libelle_couchage, taille_couchage.personnes, 
	libelle_literie, taille_literie.personnes
FROM
	couchage JOIN taille AS taille_couchage ON couchage.fk_taille_couchage = taille_couchage.idtaille,
    literie JOIN taille AS taille_literie ON literie.fk_taille_literie = taille_literie.idtaille
WHERE
	taille_couchage.personnes = taille_literie.personnes")->fetchAll();
        return $couchage;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les pieces où sont rangés les items de linge
 */
function getPieceForLiterie($idliterie) 
{
    global $conn;
    
    try 
    {
        $piece = $conn->query("SELECT libelle_piece FROM rangement JOIN piece JOIN linge on rangement.fk_idpiece_rangement = piece.idpiece and rangement.fk_idlinge_rangement = linge.idliterie WHERE linge.idliterie = $idliterie")->fetch();
        return $piece;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
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

