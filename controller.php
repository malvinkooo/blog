<?php
require_once "functions.php";

switch ($_GET['mode']) {
	case "add-category":
		if(isset($_POST['category'])) {
			add_category($_POST['category']);
			header('Location: http://blog.com/');
		}
		break;

	case "remove-category":
		if(isset($_POST['id-category'])) {
			remove_category($_POST['id-category']);
			header('Location: http://blog.com/');
		}
		break;

	default:
		# code...
		break;
}
?>