<?php
/*
 * Liste des fonctions :
 *  getCouchage()
 *  getLiterie()
 *  getLinge()
 *  getPieceForItem($iditem)
 *  getAssortiForItem($iditem, $theme)
 *  getToutForCouchage()
 */

/* 
 * requete pour sélectionner tout le couchage et afficher une liste
 */
require_once("db_connect.php");

function getCouchage() 
{
    global $conn;
    try 
    {
        $couchage = $conn->query("SELECT * 
                                  FROM item i 
                                  JOIN type ty JOIN taille ta JOIN appartenance a
                                  ON i.fk_taille = ta.idtaille AND i.fk_type = ty.idtype AND i.fk_appartenance = a.idappartenance
                                  WHERE fk_type < 5")->fetchAll();
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
        $literie = $conn->query("SELECT * FROM item i JOIN type ty JOIN taille ta ON i.fk_taille = ta.idtaille AND i.fk_type = ty.idtype where fk_type in (5,6)")->fetchAll();
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
        $linge = $conn->query("SELECT * FROM item i JOIN type ty JOIN taille ta JOIN appartenance a ON i.fk_appartenance = a.idappartenance AND i.fk_taille = ta.idtaille AND i.fk_type = ty.idtype WHERE fk_type > 6")->fetchAll();
        return $linge;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les pieces où se trouvent les items 
 */
function getPieceForItem($iditem) 
{
    global $conn;
    
    try 
    {
        $piece_item = $conn->query("SELECT p_libelle from piece p join item i on i.fk_piece = p.idpiece where i.iditem = $iditem")->fetch();
        return $piece_item;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner les item assortis pour un item
 */
function getAssortiForItem($iditem, $theme) 
{
    global $conn;
    
    try 
    {
        $assorti_item = $conn->query("SELECT i.iditem, i.theme, i.couleur, t.t_libelle as t_libelle
                                    FROM item i 
                                    JOIN type t
                                    ON i.fk_type = t.idtype
                                    WHERE i.theme = '$theme'
                                    AND i.iditem != $iditem")->fetchAll();
        return $assorti_item;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
/* 
 * requete pour sélectionner la literie et le linge convenant à un couchage
 */
function getToutForCouchage() 
{
    global $conn;
    try 
    {
        $literie_couchage = $conn->query("SELECT 
                                            *, COUNT(*) AS quantite
                                          FROM
                                           item i JOIN taille ta JOIN type t JOIN appartenance a
                                          ON ta.idtaille = i.fk_taille AND t.idtype = i.fk_type AND a.idappartenance = fk_appartenance
                                          WHERE
                                           i.fk_type >= 5
                                          GROUP by 
                                            matiere, fk_taille, fk_type, theme, couleur, fk_appartenance
                                          ORDER BY 
                                            i.fk_type")->fetchAll();
        return $literie_couchage;
    } 
    catch (PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
}


