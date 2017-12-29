<?php
require_once "functions.php";

switch ($_GET['mode']) {
	case "add-category":
		if(isset($_POST['category'])) {
			add_category($_POST['category']);
			header('Location: /');
			exit();
		}
		break;

	case "remove-category":
		if(isset($_POST['id-category'])) {
			remove_category($_POST['category-id']);
			header('Location: /');
			exit();
		}
		break;
	case "edit-category":
		if(isset($_POST['category-id'])) {
			edit_category($_POST['category-id'], $_POST['category']);
			header('Location: /');
			exit();
		}
		break;
}
?>