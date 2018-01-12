<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader, array(
	'debug' => true,
));
$twig->addExtension(new Twig_Extension_Debug());

$data = array(
	'categories' => '',
	'current_category' => '',
	'article' => '',
	'comments' => '',
	'comments_count' => '',
	'mode' => ''
);

$data['categories'] = get_categories();
$data['current_category'] = get_current_category($_GET['category_id']);
$data['mode'] = $_GET['mode'];

if(isset($_GET['article_id'])) {
	$data['article'] = get_article($_GET['article_id']);
	$data['comments'] = get_comments($_GET['article_id']);
	$data['comments_count'] = count($data['comments']);
}

echo $twig->render('article.html', $data);
?>