<!DOCTYPE html>
<html>
<head>
	<?php include("../config/config.php");?>
	<?php if ($CURRENT_PAGE == "Index") { ?>
	<meta name="description" content="" />
	<meta name="keywords" content="" /> 
<?php } ?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
	#main-content {
		margin-top:20px;
	}
	.footer {
		font-size: 14px;
		text-align: center;
	}
</style>
</head>
<body>

<div class="jumbotron">
	<h1>Balek</h1>
	<h2>Bedding and linen electronic keeper</h2>
	<h2>Boite à linge électronike</h2>
</div>
<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="../index.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "About") {?>active<?php }?>" href="../about.php">About Us</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="../contact.php">Contact</a>
	  </li>
	</ul>
</div>

<div class="container" id="main-content">
	<h2>Welcome to balek!</h2>
	<p>Inventorize you linen and bedding to externalize your memory and make it accessible to the entire household.</p>

	<a href="../couchage_list.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Couchage</a>
	<a href="../linge_list.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Linge de lit</a>
	<a href="../couchage_partype.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Choisir par type de couchage</a>
</div>

<?php include("../includes/footer.php");?>

</body>
</html>