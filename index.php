<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

$data = get_categories();

echo $twig->render('index.html', array('categories' => $data));
?>