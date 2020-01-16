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
        <th scope="col">Thème/Couleur</th>
        <th scope="col">Utilisation</th>
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
    if ($row['theme'] != NULL){
        echo "Imprimé ".$row['theme'];
        }
    else {
        echo $row['couleur'];
    }
    echo "</td>
    <td>";
    switch ($row['largeur']) {
        case 60:
            echo "Oreiller carré";
            break;
        case 70:
            echo "Lit d'enfant Ikea";
            break;
        case 80:
            echo "Matelas pliant";
            break;
        case 90:
            echo "Matelas 1 place";
            break;
        case 140:
            echo "Couette 1p.";
            break;        
        case 160:
            echo "Matelas 2 places";
            break;
        case 180:
            echo "Lit 1 places";
            break;
        case 200:
            echo "Couette des invités 2p.";
            break;
        case 220:
            echo "Couette des parents";
            break;
        default:
            echo "?";
            break;
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