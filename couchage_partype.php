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
            <h1>2 personnes</h1>
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
                        $couchage = getCouchage();
                        $literie = getLiterie();    
                        foreach ($couchage as $row){
                            $piece_couchage = getPieceForItem($row["iditem"]);
                            
                            echo "<tr>
                            <td>".$row['t_libelle']." ".$row['personnes']." personnes"."</td>  
                            <td>".$piece_couchage['p_libelle']."</td>
                            <td>";    
                            $first = true;
                            $literie_couchage = getLiterieForCouchage($row["fk_type"]);
                            foreach ($literie_couchage as $row_literie){        
                                if ($first == false){
                                    echo ", ";
                                }
                                else {
                                    $first = false;
                                }
                                echo $row_literie['t_libelle'];                
                                }                
                            "</tr>";
                        
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <h1>1 personne</h1>
            <!--Tableau à 3 colonnes : Lit (couchage + drap-housses); Couette (couette + housses); Oreillers (oreillers + housses) -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lit</th>
                        <th scope="col">Couette</th>                       
                        <th scope="col">Oreillers</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $couchage = getCouchage();
                        $literie = getLiterie();    
                        foreach ($couchage as $row){
                            $piece_couchage = getPieceForItem($row["iditem"]);    
                            echo "<tr>
                            <td>".$row['t_libelle']."</td>     
                            <td>".$row['personnes']." personnes"."</td> 
                            <td>".$piece_couchage['p_libelle']."</td>
                            </tr>";
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