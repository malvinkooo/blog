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
			$db = new PDO('mysql:host=localhost;dbname=yummy_blog', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARSET utf8'));

			$stm = $db->prepare("INSERT INTO `comments` (`author`, `date`, `text`, `article_id`) VALUES (:author, :date, :message, :article_id)");

			$stm->execute(array(
				':author' => $_POST['name'],
				':date' => date('Y-m-d'),
				':text' => $_POST['message'],
				':article_id' => $_POST['article_id']
			));
			// add_comment($_POST);
			// header('Location: /');
			exit();
		}
		break;
}
?>