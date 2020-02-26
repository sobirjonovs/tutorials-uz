<?php 

namespace App\Core;

session_start();

ini_set("display_errors", "on");
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function($class){
    preg_match("#^(.+)\\\\(.+)$#", $class, $match);
    $nameSpace = str_replace("\\", DS, strtolower($match[1]));
    $className = ucfirst($match[2]);
    $classPath = $nameSpace . DS . $className . '.php';
    //  $classPath = str_replace("\\", DS, $class.'.php');
    if (file_exists($classPath)) {
        require $_SERVER['DOCUMENT_ROOT'] . DS . $classPath;
    }else {
        throw new \Exception("Klass {$classPath} mavjud emas, iltimos boshqa nom topib ko'ring");
    }
});

$router = new Router;
$routes = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/routes.php';

$track = (new Router())->getTrack($routes,$_SERVER['REQUEST_URI']);
$page = (new Dispatcher) -> getPage($track);
echo (new View)->render($page);
