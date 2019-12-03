<?php
/**
 * page variables
 */
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/balek/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About balek";
			break;
		case "/balek/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact me";
			break;
		case "/balek/couchage_list.php":
			$CURRENT_PAGE = "Couchage"; 
			$PAGE_TITLE = "Couchage";
			break;
		case "/balek/linge_list.php":
			$CURRENT_PAGE = "Linge"; 
			$PAGE_TITLE = "Linge";
			break;
			case "/balek/couchage_partype.php":
			$CURRENT_PAGE = "Par type"; 
			$PAGE_TITLE = "Partype";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to balek!";
	}
?>