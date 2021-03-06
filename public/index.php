<!DOCTYPE html>
<html>
<head>
	<?php include("../config/config.php");?>
	<?php if ($CURRENT_PAGE == "Index") { ?>
	<meta name="description" content="" />
	<meta name="keywords" content="" /> 
<?php } ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><style>
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