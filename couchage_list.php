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
    
<!--Tableau à 4 colonnes : Item (type, thème/couleur, img modal) ; Utilisation (qui/où) ; Rangement (où); Linge assorti -->
<table class="table table-bordered table-hover">
  <thead>
    <tr>
        <th scope="col">Item</th>
        <th scope="col">Aspect</th> 
        <th scope="col">Utilisation</th>
        <th scope="col">Rangé</th>
        <th scope="col">Linge assorti</th>	  
    </tr>
  </thead>
  <tbody>      
    <?php
    $linge = getLinge();
    foreach ($linge as $row){
        $piece_linge = getPieceForItem($row["iditem"]);
        echo "<tr>";
        if ($row['theme'] != NULL && $row['idappartenance'] == 1) {    
            echo "<td>".$row['t_libelle']." (".$row['largeur']."x".$row['longeur'].") </td><td>";
            if ($row['theme'] != NULL && $row['couleur'] != NULL){
//              echo "Imprimé ".$row['theme']." ".$row['couleur'];
                echo "<a data-toggle="."modal"." href="."#myModal"." data-img='".$row['img_url']."' data-title='".$row['theme']."'>Imprimé ".$row['theme']." ".$row['couleur']."</a>";
                }
            elseif ($row['theme'] != NULL) {
    //          echo "Imprimé ".$row['theme'];
                echo "<a data-toggle="."modal"." href="."#myModal"." data-img='".$row['img_url']."' data-title='".$row['theme']."'>Imprimé ".$row['theme']."</a>";
            }
            else {
//              echo $row['couleur'];
                echo "<a data-toggle="."modal"." href="."#myModal".">".$row['couleur']."</a>";
            }
            echo "</td>";
            if ($row['idappartenance'] == 5){
                echo "<td>".$row['a_libelle']." ".$row['personnes']." personnes"."</td>";
            }
            else {
                echo "<td>".$row['a_libelle']."</td>";
                }
            echo "</td>    
            <td>".$piece_linge['p_libelle']."</td>
            <td>";
            $first = true;
            $linge_assorti = getAssortiForItem($row['iditem'], $row['theme']);
            foreach ($linge_assorti as $row_assorti){        
                if ($first == false){
                    echo ", ";
                }
                else {
                    $first = false;
                }
                echo $row_assorti['t_libelle'];                
                } 
            }    
        "</tr>";
    }
    ?>
  </tbody>
</table>


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

<!--Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> variable </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

<!--Modal body -->
      <div class="modal-body">
        <img src=" variable "
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