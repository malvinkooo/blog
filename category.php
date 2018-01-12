<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

$categories = get_categories();

$articles = get_articles_by_category($_GET['id']);

$current_category = get_current_category($_GET['id']);

echo $twig->render('category.html', array('categories' => $categories, 'articles' => $articles, 'current_category' => $current_category));
?>