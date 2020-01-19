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
        <th scope="col">Couchage</th>
        <th scope="col">Thème/Couleur</th>
        <th scope="col">Type</th>
        <th scope="col">Rangé</th>
        <th scope="col">Linge assorti</th>	  
    </tr>
  </thead>
  <tbody>      
    <?php
    $linge = getLinge();
    foreach ($linge as $row){
    $piece_linge = getPieceForItem($row["iditem"]);
    echo "<tr>
    <td>".$row['t_libelle']."</td>  
    <td>";
    if ($row['theme'] != NULL && $row['couleur'] != NULL){
        echo "Imprimé ".$row['theme']." ".$row['couleur'];
        }
    elseif ($row['theme'] != NULL) {
    echo "Imprimé ".$row['theme'];
    }
    else {
        echo $row['couleur'];
    }
    if ($row['idappartenance'] == 5){
        echo "<td>".$row['a_libelle']." ".$row['personnes']." personnes"."</td>";
    }
    else {
        echo "<td>".$row['a_libelle']."</td>";
        }
    echo "</td>    
    <td>".$piece_linge['p_libelle']."</td>
    </tr>";
    }?>
  </tbody>
</table>
</div>

<?php include("includes/footer.php");?>

</body>
</html>