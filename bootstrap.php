<?php 

require_once 'vendor/autoload.php';

function render($filename, $parameters)
{
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate($filename . '.html.twig');
    echo $template->render($parameters);
}

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = [
    'dbname' => 'practice',
    'driver' => 'pdo_sqlite',
];

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
