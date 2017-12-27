<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

$get_categories = $db->prepare("SELECT * FROM categories");
$categories = $get_categories->execute();
$categories = $get_categories->fetchAll(PDO::FETCH_ASSOC);

$get_current_category = $db->prepare("SELECT * FROM categories WHERE id = ?");
$current_category = $get_current_category->execute(array($_GET['category_id']));
$current_category = $get_current_category->fetchAll(PDO::FETCH_ASSOC);

$get_article = $db->prepare("SELECT * FROM articles WHERE id = ?");
$article = $get_article->execute(array($_GET['article_id']));
$article = $get_article->fetchAll(PDO::FETCH_ASSOC);

var_dump($article);

echo $twig->render('single.html', array('categories' => $categories, 'current_category' => $current_category[0], 'article' => $article[0]));
?>