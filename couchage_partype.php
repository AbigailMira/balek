<?php include("config/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/header.php");?>
<?php include("includes/navigation-list.php");?>
<?php require("balekControleur.php");?>


<div class="container" id="main-content">
    <div class="row">
        <div class="col-sm">
            <h1>Couchage 2 personnes</h1>
            <!--Tableau à 3 colonnes : Lit (couchage + drap-housses); Couette (couette + housses); Oreillers (oreillers + housses) -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lit</th>
                        <th scope="col">Piece</th>
                        <th scope="col">Couette</th>                       
                        <th scope="col">Oreillers</th>
                    </tr>
                </thead>
                <tbody>                   
                    <?php
                    /*
                     *  Liste des variables
                     *      $couchage : liste des lits
                     *      $row_c : itérateur de la liste des lits
                     *      $piece_couchage : liste des pieces par lit
                     *      $row_p : itérateur de la liste des pieces par lits
                     *      $tout_lit : liste des items de literie et de linge par lit
                     *      $row_t : itérateur de la liste des items de literie et de linge par lit               
                     */
                        $couchage = getCouchage();
                        foreach ($couchage as $row_c){
                            $row_p = getPieceForItem($row_c["iditem"]);
                            if ($row_c['personnes'] == 2){
                                echo "<tr>
                                <td>".$row_c['t_libelle']."</td>  
                                <td>".$row_p['p_libelle']."</td>
                                <td>";    
                                $first = true;
                                $tout_lit = getToutForCouchage($row_c["iditem"]);
                                /*
                                 * Selection de la couette et du linge approprié
                                 */
                                foreach ($tout_lit as $row_t){                                                                         
                                    if ($row_t['fk_type'] == 8 && $row_t['personnes'] == 2 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                        if ($first == false){
                                                echo ", ";
                                            }
                                            else {
                                                $first = false;
                                            }    
                                        echo $row_t['theme']." ".$row_t['couleur'];
                                    } 
                                }
                                echo "</td>";
                                /*
                                 * Selection des oreillers et du linge approprié
                                 */
                                echo "<td>";
                                $first = true;
                                foreach ($tout_lit as $row_t){                                                                         
                                    if ($row_t['fk_type'] == 6 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                        if ($first == false){
                                                echo ", ";
                                            }
                                            else {
                                                $first = false;
                                            }    
                                        echo $row_t['quantite']." ".$row_t['matiere'];
                                    }
                                }
                                
                                // retour à la ligne si type différent
                                $different = true;
                                
                                $first = true;
                                foreach ($tout_lit as $row_t){
                                    if ($different == false){
                                        if ($row_t['fk_type'] == 9 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                            if ($first == false){
                                                    echo ", ";
                                                }
                                                else {
                                                    $first = false;
                                                }    
                                            echo $row_t['quantite']." ".$row_t['theme']." ".$row_t['couleur'];
                                        }                                    
                                    }
                                    else {
                                        echo '<br>';
                                        $different = false;
                                    }
                                }
                                "</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <h1>Couchage 1 personne</h1>
            <!--Tableau à 3 colonnes : Lit (couchage + drap-housses); Couette (couette + housses); Oreillers (oreillers + housses) -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lit</th>
                        <th scope="col">Piece</th>
                        <th scope="col">Couette</th>                       
                        <th scope="col">Oreillers</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*
                     *  Liste des variables
                     *      $couchage : liste des lits
                     *      $row_c : itérateur de la liste des lits
                     *      $piece_couchage : liste des pieces par lit
                     *      $row_p : itérateur de la liste des pieces par lits
                     *      $tout_lit : liste des items de literie et de linge par lit
                     *      $row_t : itérateur de la liste des items de literie et de linge par lit               
                     */
                        $couchage = getCouchage();
                        foreach ($couchage as $row_c){
                            $row_p = getPieceForItem($row_c["iditem"]);
                            if ($row_c['personnes'] == 1){
                                echo "<tr>
                                <td>".$row_c['t_libelle']."</td>  
                                <td>".$row_p['p_libelle']."</td>
                                <td>";    
                                $first = true;
                                $tout_lit = getToutForCouchage($row_c["iditem"]);
                                foreach ($tout_lit as $row_t){                                                                         
                                    if ($row_t['fk_type'] == 8 && $row_t['personnes'] == 1 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                        if ($first == false){
                                                echo ", ";
                                            }
                                            else {
                                                $first = false;
                                            }    
                                        echo $row_t['theme']." ".$row_t['couleur'];
                                    } 
                                }
                                echo "</td>";
                                /*
                                 * Selection des oreillers et du linge approprié
                                 */
                                echo "<td>";
                                $first = true;
                                foreach ($tout_lit as $row_t){                                                                         
                                    if ($row_t['fk_type'] == 6 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                        if ($first == false){
                                                echo ", ";
                                            }
                                            else {
                                                $first = false;
                                            }    
                                        echo $row_t['quantite']." ".$row_t['matiere'];
                                    }
                                    elseif ($row_t['fk_type'] == 9 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                        if ($first == false){
                                                echo ", ";
                                            }
                                            else {
                                                $first = false;
                                            }    
                                        echo $row_t['quantite']." ".$row_t['theme']." ".$row_t['couleur'];
                                    } 
                                } 
                                "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php");?>

</body>
</html>