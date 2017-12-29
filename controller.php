<?php
require_once "functions.php";

switch ($_GET['mode']) {
	case "add-category":
		if(isset($_POST['category'])) {
			echo $_POST['category']."<br>";

			add_category($_POST['category']);
			header('Location: http://blog.com/');
		}
		break;

	default:
		# code...
		break;
}
?>