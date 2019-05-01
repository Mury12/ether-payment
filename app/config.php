<?php
use Model\Router;
use Model\Connection;
use Model\Session;
use Controller\SubsectionController;

require_once 'functions.php';
require_once 'app/partials/classes/model/Session.php';
require_once 'app/partials/classes/model/Connection.php';
require_once 'app/partials/classes/model/Router.php';
require_once 'app/partials/classes/controller/SubsectionController.php';
// require_once 'app/partials/classes/controller/SectionController.php';

ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

 define('DB_HOST', 'localhost');
 define('DB_NAME', 'mm_proj1');
 define('DB_USER', 'root');
 define('DB_PASS', 'root');

$c_db = new Connection(DB_HOST, DB_NAME, DB_USER, DB_PASS);

try{
    $conn = $c_db->connectMysql();
}catch(PDOException $e){
    makeAlert($e->getMessage(), 3000);
}

$r = new Router();
$routes = require_once('routes.php');
$_routes= require_once('dynamic-routes.php');
$routes = array_merge($routes, $_routes);

$r->new_route($routes);



$_s = new Session();
$_s->initSession();

$layout  = $r->getPage();

$section = Array(
    'ssTitle' => "Uma subseção!",
    'ssContent' => "O conteúdo de uma subseção pode ser qualquer coisa. Um texto, imagens ou mídia.",
    'ref' => '14'
);
