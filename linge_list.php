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
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">Type</th>
	  <th scope="col">Lit</th>
      <th scope="col">Thème</th>
	  <th scope="col">Rangé</th>
	  <th scope="col">Linge assorti</th>
	  
    </tr>
  </thead>
  <tbody>      
    <?php
    $linge = getLinge();
    foreach ($linge as $row){
    $piece_linge = getPieceForLinge($row["idlinge"]);
    echo "<tr>
    <td>".$row['libelle_linge']."</td>     
    <td>";
    if ($row['largeur'] == 70){
            echo "Lit d'enfant Ikea";
        }
        elseif ($row['largeur'] == 160){
            if ($row['couleur'] == 'Pourpre' || $row['couleur'] == 'Safran') {
                echo "Lit des parents";
            }            
        }
    echo "</td>
    <td>";
    if ($row['theme'] != NULL){
        echo "Imprimé ".$row['theme'];
        }
    else {
        echo $row['couleur'];
    }
    echo "</td>
    <td>".$piece_linge['libelle_piece']."</td>
    </tr>";
    }?>
  </tbody>
</table>
</div>

<?php include("includes/footer.php");?>

</body>
</html>