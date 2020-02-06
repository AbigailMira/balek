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
            <!--Tableau à 4 colonnes : Lit (couchage + drap-housses); Pièce où le trouver (pragmatique) ; Couette (couette + housses); Oreillers (oreillers + housses) -->
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
                                        echo "<a data-toggle="."modal"." href="."#myModal"." data-img='".$row_t['img_url']."' data-title='".$row_t['theme']."'>Imprimé ".$row_t['theme']." ".$row_t['couleur']."</a>";
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
                                                echo "Oreillers : ";
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
                                                    echo "Housses : ";
                                                    $first = false;
                                                }    
                                            echo "<a data-toggle="."modal"." href="."#myModal"." data-img='".$row_t['img_url']."' data-title='".$row_t['theme']."'>".$row_t['quantite']." ".$row_t['theme']." ".$row_t['couleur']."</a>";

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
            <!--Tableau à 4 colonnes : Lit (couchage + drap-housses); Pièce où le trouver (pragmatique) ; Couette (couette + housses); Oreillers (oreillers + housses) -->
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
                                /*
                                 * Selection de la couette et du linge approprié
                                 */
                                foreach ($tout_lit as $row_t){                                                                         
                                    if ($row_t['fk_type'] == 8 && $row_t['personnes'] == 1 && $row_c['fk_appartenance'] == $row_t['fk_appartenance']){
                                        if ($first == false){
                                                echo ", ";
                                            }
                                            else {
                                                $first = false;
                                            }    
                                            echo "<a data-toggle="."modal"." href="."#myModal"." data-img='".$row_t['img_url']."' data-title='".$row_t['theme']."'>".$row_t['theme']." ".$row_t['couleur']."</a>";
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
                                                echo "Oreillers : ";
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
                                                    echo "Housses : ";
                                                    $first = false;
                                                }    
                                            echo "<a data-toggle="."modal"." href="."#myModal"." data-img='".$row_t['img_url']."' data-title='".$row_t['theme']."'>".$row_t['quantite']." ".$row_t['theme']." ".$row_t['couleur']."</a>";
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
</div>
    
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

    <!--Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    <!--Modal body -->
      <div class="modal-body">
        <img src=""
             alt="pas d'image disponible" width="100%" height="100%">
      </div>

    <!--Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--the Modal script, using data attributes with Bootstrap 4-->
<script language='javascript'>
$('#myModal').on('show.bs.modal', function (event) {
  var imgName = $(event.relatedTarget) // link that triggered the modal
  var imgSource = imgName.data('img') // Extract info from data-* attributes : -img and -title
  var imgTitle = imgName.data('title')
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(imgTitle)
  modal.find('.modal-body img').attr("src", imgSource)
}) 
</script>

<?php include("includes/footer.php");?>

</body>
</html>