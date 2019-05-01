<?php

namespace Entity;

use Model\Photo;
require_once 'app/partials/classes/model/Photo.php';

use \PDO;

class PhotoEntity
{
    private $photo;

    function __construct($request = null)
    {
        $this->photo = $request;
    }

    function insertPhoto()
    {
        global $conn;

        $query = 'INSERT INTO photo (url, description, album) VALUES (?, ?, ?)';

        $q = $conn->prepare($query);
            $q->bindParam(1, $this->photo->url);
            $q->bindParam(2, $this->photo->desc);
            $q->bindParam(3, $this->photo->album);

        return $this->executeQuery($q);
    }

    function deletePhoto()
    {
        global $conn;
        
            $query = 'UPDATE photo SET status = 0 WHERE id = ?';

            $q = $conn->prepare($query);
            $q->bindParam(1, $this->photo->id);

            if($this->executeQuery($q)){
                $this->removePhotoFromStorage();
                return true;
            }
        return false;
    }

    function removePhotoFromStorage()
    {
        global $conn;

        $query = 'SELECT url FROM photo WHERE id = ?';

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->photo->id);

        $q = $this->executeQuery($q);
        if($q != false && $q->rowCount() > 0){
            $r = $q->fetch(PDO::FETCH_ASSOC);
            $url = substr($r['url'], 1);

            if(file_exists($url) && \unlink($url)){
                return true;
            }

        }
        return false;
    }

    function getPhotos()
    {
        global $conn;

        $query = 'SELECT * FROM photo WHERE album = ? AND status = 1';

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->photo->album);

        return \makeArrayFromQuery($this->executeQuery($q), 'Model\Photo');
    }

    function updatePhotoDescription()
    {
        global $conn;

        $query = "UPDATE photo SET description = ? WHERE id = ?";

        $q = $conn->prepare($query);
            $q->bindValue(1, $this->photo->desc);
            $q->bindValue(2, $this->photo->id);

        return $this->executeQuery($q);
    }

    function insertImageToAlbum()
    {
        global $conn;

        $query = "INSERT INTO photo (url, description, album, status) VALUES (?, ?, ?, 1)";

        $q = $conn->prepare($query);
        $q->bindParam(1, $this->photo->url);
        $q->bindParam(2, $this->photo->desc);
        $q->bindParam(3, $this->photo->album);

        return $this->executeQuery($q);
    }

    function executeQuery($q)
    {
        try{
            if($q->execute()) return $q;
        }catch(PDOExeption $e){
            echo $e;
        }
        return false;
    }
}