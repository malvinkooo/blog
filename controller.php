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
		if(isset($_POST['comment-id'])) {
			remove_comment($_POST['comment-id']);
			header("Location: ". $_SERVER['HTTP_REFERER']);
			exit();
		}
		break;
	case "edit-comment":
		if(isset($_POST['comment-id'])) {
			edit_comment($_POST);
			header("Location: ". $_SERVER['HTTP_REFERER']);
			exit();
		}
		break;
	case "add-article":
		if(isset($_POST)) {
			add_article($_POST);
			$id = (int) $_POST['category_id'];
			$loc = "/section.php?id=$id";
			header("Location: $loc");
			exit();
		}
		break;
	case "remove-article":
		if(isset($_POST)) {
			remove_article($_POST['article-id']);
			$id = (int) $_POST['category-id'];
			$loc = "/section.php?id=$id";
			header("Location: $loc");
			exit();
		}
		break;
}
?>