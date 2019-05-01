<?php

namespace Model;

class Album
{
    public $name;
    public $id;
    public $thumb;
    public $pht;
    public $desc;

    function __construct($data = null)
    {
        if(is_array($data)){

                $this->name = $data['name'] ?? null;
                $this->id = $data['id'] ?? null;
                $this->pht = $data['photos'] ?? null;
                $this->thumb = $data['thumb'] ?? null;
                $this->desc = $data['description'] ?? null;
                $this->desc = $data['desc'] ?? null;            
        }
    }

    function getName()
    {
        return $this->name;
    }

    function getId()
    {
        return $this->id;
    }

    function saveThumbnail($_f)
    {
        $r = Array();
            if ($_f !== null && \sizeof($_f) > 0) {
                $ext = strtolower(substr($_f['name'], -4));
                if (!strpos($ext, '.') === false) {
                    $ext = "." . $ext;
                }
                $newname = uniqid(); //NOVO NOME
                $dir = 'assets/img/thumb/';
                $f = array('file' => $_f['tmp_name'], 'dir' => $dir . $newname . $ext);
            }
            if(move_uploaded_file($f['file'], $f['dir']) != false){
                $r[] = $f['dir'];
            }
        return $r;
    }
    
    function setThumbnail($path)
    {
        $this->thumb = $path;
    }
}