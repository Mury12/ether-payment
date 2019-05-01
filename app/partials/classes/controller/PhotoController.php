<?php

namespace Controller;

use Entity\PhotoEntity;
use Model\Photo;

require_once 'app/partials/classes/entities/PhotoEntity.php';
require_once 'app/partials/classes/model/Photo.php';

class PhotoController
{
    private $pe;
    private $ph;

    function __construct($request = null)
    {
        $this->ph = new Photo($request);
        $this->pe = new PhotoEntity($this->ph);
    }

    function insertPhoto()
    {
        return $this->pe->insertPhoto();
    }

    function deletePhoto()
    {
        return $this->pe->deletePhoto();
    }

    function getPhotos()
    {
        return $this->pe->getPhotos();
    }

    function updatePhotoDescription()
    {
        return $this->pe->updatePhotoDescription();
    }

    function saveFile($files)
    {
        return $this->ph->saveFile($files);
    }

    function insertImageToAlbum()
    {
        return $this->pe->insertImageToAlbum();
    }

    function setPhotos($data)
    {
        $this->ph = new Photo($data);
        $this->pe = new PhotoEntity($this->ph);
    }
}