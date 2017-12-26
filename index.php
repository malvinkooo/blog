<?php
require_once "vendor/autoload.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

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

$stm = $db->prepare("SELECT * FROM categories");
$stm->execute();

$data = $stm->fetchAll(PDO::FETCH_ASSOC);

$categories = array();
foreach ($data as $category) {
	$categories[] = $category['name'];
}
echo $twig->render('index.html', array('categories' => $categories));
?>