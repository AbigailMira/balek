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
        $couchage = $conn->query("SELECT * FROM item i JOIN taille t ON i.fk_ite_idtaille = t.idtaille where fk_ite_idtype < 5")->fetchAll();
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
        $literie = $conn->query("SELECT * FROM item i JOIN taille t ON i.fk_ite_idtaille = t.idtaille where fk_ite_idtype in (5,6)")->fetchAll();
        return $literie;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner tout le linge et afficher une liste
 */
function getLinge() 
{
    global $conn;
    try 
    {
        $linge = $conn->query("SELECT * FROM item i JOIN taille t ON i.fk_ite_idtaille = t.idtaille where fk_ite_idtype > 6")->fetchAll();
        return $linge;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les pieces où se trouvent les items de couchage (lits, matelas)
 */
function getPieceForCouchage($idcouchage) 
{
    global $conn;
    
    try 
    { //todo : requete
        $piece_couchage = $conn->query("SELECT libelle_piece FROM rangement JOIN piece JOIN couchage on rangement.fk_idpiece_rangement = piece.idpiece and rangement.fk_idcouchage_rangement = couchage.idcouchage WHERE couchage.idcouchage = $idcouchage")->fetch();
        return $piece_couchage;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les pieces où sont rangés les items de literie (couettes, oreillers)
 */
function getPieceForLiterie($idliterie) 
{
    global $conn;
    
    try 
    {
        $piece_literie = $conn->query("SELECT libelle_piece FROM rangement JOIN piece JOIN linge on rangement.fk_idpiece_rangement = piece.idpiece and rangement.fk_idlinge_rangement = linge.idliterie WHERE linge.idliterie = $idliterie")->fetch();
        return $piece_literie;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les pieces où sont rangés les items de linge (draps, housses)
 */
function getPieceForLinge($idlinge) 
{
    global $conn;
    
    try 
    {
        $piece_linge = $conn->query("SELECT libelle_piece FROM rangement JOIN piece JOIN linge on rangement.fk_idpiece_rangement = piece.idpiece and rangement.fk_idlinge_rangement = linge.idlinge WHERE linge.idlinge = $idlinge")->fetch();
        return $piece_linge;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les associations compatibles de literie par couchage
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
        return $literie_couchage;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

