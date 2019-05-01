<?php

use Controller\AlbumController;
use Controller\PhotoController;

require_once 'app/partials/classes/controller/AlbumController.php';
require_once 'app/partials/classes/controller/PhotoController.php';

$data = array_map('addslashes', $_POST);
$exec = $data['exec'];

$r = Array('res'=>'Nothing found..', 'err'=>true);

if($exec == 'get_album' ){


    $p = new PhotoController($data);
    $r = $p->getPhotos();

}
elseif($exec == 'get_all_albums'){
    $p = new AlbumController();
    $r = $p->getAllbums();
}

sendJsonResponse($r);
