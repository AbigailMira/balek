<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="public/index.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Couchage") {?>active<?php }?>" href="couchage-list.php">Couchage</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Linge") {?>active<?php }?>" href="linge-list.php">Linge de lit</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Partype") {?>active<?php }?>" href="couchage-partype.php">Choix par type</a>
	  </li>
	</ul>
</div>