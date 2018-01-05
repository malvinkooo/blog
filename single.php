<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader, array(
	'debug' => true,
));
$twig->addExtension(new Twig_Extension_Debug());

$categories = get_categories();
$current_category = get_current_category($_GET['category_id']);

if(isset($_GET['article_id'])){
	$article = get_article($_GET['article_id']);
	$comments = get_comments($_GET['article_id']);
	$comments_count = count($comments);
	echo $twig->render('single.html', array(
		'categories' => $categories,
		'current_category' => $current_category[0],
		'article' => $article[0],
		'comments' => $comments,
		'comments_count' => $comments_count
	));
} else {
	echo $twig->render('single.html', array(
		'categories' => $categories,
		'current_category' => $current_category[0]
	));
}




?>