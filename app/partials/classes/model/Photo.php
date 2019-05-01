<?php

namespace Model;

class Photo
{
    public $url;
    public $desc;
    public $album;
    public $id;

    function __construct($data = null)
    {
        if(is_array($data) && array_key_exists('url', $data))
            $this->url = $data['url'];
        
        if (is_array($data) && array_key_exists('description', $data)) {
            $this->desc = $data['description'];
        }
    
        if (is_array($data) && array_key_exists('albumId', $data)) {
            $this->album = $data['albumId'];
        }
        
        if (is_array($data) && array_key_exists('album', $data)) {
            $this->album = $data['album'];
        }
    
        if (is_array($data) && array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        
    }

    function getUrl()
    {
        return $this->url;
    }

    function getDescription()
    {
        return $this->desc;
    }

    function getAlbum()
    {
        return $this->album;
    }

    function getId()
    {
        return $this->id;
    }

    function saveFile($files)
    {
        $r = Array();
        foreach($files as $_f){
            if ($_f !== null && \sizeof($_f) > 0) {
                $ext = strtolower(substr($_f['name'], -4));
                if (!strpos($ext, '.') === false) {
                    $ext = "." . $ext;
                }
                $newname = uniqid(); //NOVO NOME
                $dir = 'assets/img/albums/';
                $f = array('file' => $_f['tmp_name'], 'dir' => $dir . hash('sha256', $newname) . $ext);
            }
            if(move_uploaded_file($f['file'], $f['dir']) != false){
                $r[] = $f['dir'];
            }
        }
        return $r;
    }
}