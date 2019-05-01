<?php

namespace Controller;

use Entity\AlbumEntity;
use Model\Album;
require_once 'app/partials/classes/entities/AlbumEntity.php';
require_once 'app/partials/classes/model/Album.php';

class AlbumController
{
    private $ae;
    private $ac;

    function __construct($data = null)
    {
        $this->ac = new Album($data);
        $this->ae = new AlbumEntity($this->ac);
    }

    function insertAlbum()
    {
        return $this->ae->insertAlbum();
    }

    function deleteAlbum()
    {
        return $this->ae->deleteAlbum();
    }

    function getAllbums()
    {
        return $this->ae->getAllbums();
    }

    function updateAlbumTitle()
    {
        return $this->ae->updateAlbumTitle();
    }

    function updateAlbumDescription()
    {
        return $this->ae->updateAlbumDescription();
    }

    function updateAlbumThumbnail()
    {
        return $this->ae->updateAlbumThumbnail();
    }

    function saveThumbnail($file)
    {
        return $this->ac->saveThumbnail($file);
    }

    function setAlbum($data)
    {
        $this->ac = new Album($data);
        $this->ae = new AlbumEntity($this->ac);
    }
}