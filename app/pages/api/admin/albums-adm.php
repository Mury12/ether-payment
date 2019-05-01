<?php

use Controller\AlbumController;
use Controller\PhotoController;

require_once 'app/partials/classes/controller/AlbumController.php';
require_once 'app/partials/classes/controller/PhotoController.php';

$data = array_map('addslashes',$_POST);
$exec = $data['exec'];
$r = Array('res'=> 'No function prompted.', 'err'=>true);

if($exec == 'get_albums'){
    $a = new AlbumController();
    $p = new PhotoController();

    $r = $a->getAllbums();
}

elseif($exec == 'delete_photo'){
    $p = new PhotoController($data);

    if($p->deletePhoto()){
        $r = Array('res'=> 'Foto removida com sucesso!', 'err'=>false);
    }else{
        $r = Array('res'=> 'Houve um problema ao remover esta foto.', 'err'=>true);
    }
}

elseif($exec == 'update_photo_description'){
    $p = new PhotoController($data);

    if($p->updatePhotoDescription()){
        $r = Array('res'=> 'Texto alterado com sucesso.', 'err'=>false);
    }else{
        $r = Array('res'=> 'Houve um problema ao alterar este texto.', 'err'=>true);
    }
}

elseif($exec == 'update_album_title'){
    $a = new AlbumController($data);
    
    if($a->updateAlbumTitle()){
        $r = Array('res'=> 'Título alterado com sucesso.', 'err'=>false);
    }else{
        $r = Array('res'=> 'Houve um problema ao alterar este título.', 'err'=>true);
    }
    
}
elseif($exec == 'update_album_description'){
    $a = new AlbumController($data);
    
    if($a->updateAlbumDescription()){
        $r = Array('res'=> 'Descrição alterada com sucesso.', 'err'=>false);
    }else{
        $r = Array('res'=> 'Houve um problema ao alterar esta descrição.', 'err'=>true);
    }
    
}

elseif($exec == 'add_photo_to_album'){
    $files = $_FILES;
    $p = new PhotoController();
    
        $f = $p->saveFile($files);
        if(sizeof($f)>0){
            foreach($f as $_f){
                $photo = Array(
                    "url" => $_f,
                    "albumId" => $data['albumId']
                );
                $p->setPhotos($photo);
                $_r[] = $p->insertImageToAlbum();
            }
            $r = Array('res'=> 'Fotos enviadas', 'err'=>false);
        }else{
            $r = Array('res'=> 'Houve algum problema ao enviar suas fotos, por favor, tente novamente.', 'err'=>true);
        }

}

elseif($exec == 'update_album_thumbnail'){
    $a = new AlbumController();

    $f = $a->saveThumbnail($_FILES['thumb']);
    if(sizeof($f) > 0){
        $album = Array(
            'id' => $data['albumId'],
            'thumb' => $f[0]
        );
        $a->setAlbum($album);

        if($a->updateAlbumThumbnail()){
            $r = Array('res'=> 'Thumbnail atualizada!', 'path' => $f[0],'err'=>false);
        }
    }else{
        $r = Array('res'=> 'Houve um problema ao atualizar. Por favor, tente novamente.', 'err'=>false);
    }
}


\sendJsonResponse($r);