<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

$get_categories = $db->prepare("SELECT * FROM categories");
$categories = $get_categories->execute();
$categories = $get_categories->fetchAll(PDO::FETCH_ASSOC);

$get_articles = $db->prepare("SELECT * FROM articles WHERE category_id = ?");
$articles = $get_articles->execute(array($_GET['id']));
$articles = $get_articles->fetchAll(PDO::FETCH_ASSOC);

$get_current_category = $db->prepare("SELECT * FROM categories WHERE id = ?");
$current_category = $get_current_category->execute(array($_GET['id']));
$current_category = $get_current_category->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('section.html', array('categories' => $categories, 'articles' => $articles, 'current_category' => $current_category[0]));
?>