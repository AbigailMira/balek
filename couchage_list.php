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
      <th scope="col">#</th>
      <th scope="col">Matelas</th>
	  <th scope="col">Couette</th>
	  <th scope="col">Oreiller 1</th>
	  <th scope="col">Oreiller 2</th>
	  <th scope="col">Oreiller 3</th>
	  <th scope="col">Oreiller 4</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $couchage = getCouchage();
    $literie = getLiterie();
    
    foreach ($couchage as $row){
    $piece = getPieceForCouchage($row["idcouchage"]);
    
    echo "<tr>
    <td>".$row['libelle_couchage']."</td>     
    <td>".$row['largeur']."x".$row['longeur']."</td>
    <td>".$row['theme']."</td>
    <td>".$row['couleur']."</td>
    <td>".$piece['libelle_piece']."</td>
    </tr>";
    }?>
  </tbody>
</table>
</div>

<?php include("includes/footer.php");?>

</body>
</html>