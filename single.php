<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

$categories = get_categories();

$current_category = get_current_category($_GET['category_id']);

$article = get_article($_GET['category_id']);

echo $twig->render('single.html', array('categories' => $categories, 'current_category' => $current_category[0], 'article' => $article[0]));
?>