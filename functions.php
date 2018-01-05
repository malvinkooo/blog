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
	$stm->execute(array($id));
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}
function add_category($name) {
	global $db;
	$stm = $db->prepare("INSERT INTO categories (`category_name`) VALUES (?)");
	$stm->execute(array($name));
}
function remove_category($id) {
	global $db;
	$stm = $db->prepare("DELETE FROM categories WHERE id = ?");
	$stm->execute(array($id));
}
function edit_category($id, $category_name) {
	global $db;
	$stm = $db->prepare("UPDATE categories SET category_name = :category_name WHERE id = :id");
	$stm->execute(array(':category_name' => $category_name, ':id' => $id));
}
function get_comments($article_id) {
	global $db;
	$stm = $db->prepare("SELECT * FROM comments WHERE article_id = ?");
	$stm->execute(array($article_id));
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}
function add_comment($comment) {
	global $db;
	$stm = $db->prepare("INSERT INTO `comments` (`author`, `date`, `text`, `article_id`) VALUES (:author, :date, :text, :article_id)");
	$stm->execute(array(
		':author' => $comment['name'],
		':date' => date('Y-m-d'),
		':text' => $comment['message'],
		':article_id' => $comment['article_id']
	));
}
function remove_comment($id) {
	global $db;
	$stm = $db->prepare("DELETE FROM comments WHERE id = ?");
	$stm->execute(array($id));
}
function edit_comment($comment) {
	global $db;
	$stm = $db->prepare("UPDATE comments SET text = :text WHERE id = :id");
	$stm->execute(array(':text' => $comment['text'], ':id' => $comment['comment-id']));
}
function add_article($article) {
	global $db;
	$stm = $db->prepare("INSERT INTO `articles` (`article_date`, `article_title`, `article_content`, `category_id`) VALUES (:article_date, :article_title, :article_content, :category_id)");
	$stm->execute(array(
		':article_date' => date('Y-m-d'),
		':article_title' => $article['title'],
		':article_content' => $article['content'],
		':category_id' => $article['category_id']
	));
}
function remove_article($id) {
	global $db;
	$stm = $db->prepare("DELETE FROM articles WHERE id = ?");
	$stm->execute(array($id));
}
?>