<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__FILE__) . '/../../vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__FILE__) . '/.');
$twig = new Environment($loader);

echo $twig->render('Test.twig', ['data' => 'Hello, Twig']);