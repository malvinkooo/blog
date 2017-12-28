<?php
try {
	$db = new PDO('mysql:host=localhost;dbname=yummy_blog', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARSET utf8'));
} catch(PDOException $e) {
	// http_response_code(500);
	// header('Content-Type', 'application/json');
	// $erroObject = array(
	// 	'error' => 'Не удалось подключиться к БД',
	// 	'details' => $e->getMessage()
	// );
	// echo json_encode($erroObject);
	// exit();
}
function get_categories() {
	global $db;
	$stm = $db->prepare("SELECT * FROM categories");
	$stm->execute();
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function get_articles_by_category($id) {
	global $db;
	$stm = $db->prepare("SELECT * FROM articles WHERE category_id = ?");
	$stm->execute(array($id));
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function get_current_category($id) {
	global $db;
	$stm = $db->prepare("SELECT * FROM categories WHERE id = ?");
	$stm->execute(array($id));
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}
function get_article($id) {
	global $db;
	$stm = $db->prepare("SELECT * FROM articles WHERE id = ?");
	$stm->execute(array($_GET['article_id']));
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>