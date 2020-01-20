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
	<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Personnes</th>
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

<?php include("includes/footer.php");?>

</body>
</html>