<?php
require_once "vendor/autoload.php";
require_once "functions.php";
$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

$stm = $db->prepare("SELECT * FROM categories");
$stm->execute();

$data = $stm->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('index.html', array('categories' => $data));
?>