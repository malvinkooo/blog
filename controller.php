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
	case "add-comment":
		if(isset($_POST['article_id'])) {
			add_comment($_POST);
			header("Location: ". $_SERVER['HTTP_REFERER']);
			exit();
		}
		break;
	case "remove-comment":
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
		if(isset($_POST['comment-id'])) {
			remove_comment($_POST['comment-id']);
			header("Location: ". $_SERVER['HTTP_REFERER']);
			exit();
		}
		break;
}
?>