<?php
namespace Entity;

use Model\Album;
require_once 'app/partials/classes/model/Album.php';


class AlbumEntity
{
    private $album;

    function __construct($album = null)
    {
        $this->album = $album;
    }
    
    function insertAlbum()
    {
        global $conn;

        $query = "INSERT INTO album (name, status) VALUES (?, 1)";

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->album->getName());

        return $this->executeQuery($q);
    }

    function deleteAlbum()
    {
        global $conn;

        $query = "UPDATE album SET status = 0 WHERE id = ?";

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->album->getId());

        return $this->executeQuery($q);

    }

    function updateAlbumTitle()
    {
        global $conn;
        $query = "UPDATE album SET name = ? WHERE id = ?";

        $albumName = \utf8_decode($this->album->name);
        $q = $conn->prepare($query);
        $q->bindParam(1, $albumName);
        $q->bindParam(2, $this->album->id);

        return $this->executeQuery($q);

    }

    function updateAlbumDescription()
    {
        global $conn;

        $query = "UPDATE album SET description = ? WHERE id = ?";

        $albumDescription = \utf8_decode($this->album->desc);
        $q = $conn->prepare($query);
        $q->bindParam(1, $albumDescription);
        $q->bindParam(2, $this->album->id);

        return $this->executeQuery($q);
    }

    function executeQuery($q)
    {
        try{
            if($q->execute()) return $q;
        }catch(PDOExeption $e){
            $e->getMessage();
        }
        return false;
    }

    function getAllbums()
    {
        global $conn;

        $query = "SELECT * FROM album WHERE status = 1";

        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);

        if($q != false && $q->rowCount() > 0){
            $r = \makeArrayFromQuery($q, 'Model\Album', true);
        }else{
            $r = [];
        }
        
        return $r;
    }

    function updateAlbumThumbnail()
    {
        global $conn;

        $query = "UPDATE album SET thumb = ? WHERE id = ?";

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->album->thumb);
        $q->bindParam(2, $this->album->id);

        return $this->executeQuery($q);

    }
}