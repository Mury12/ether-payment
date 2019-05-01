<?php

namespace Model;

class Section
{
    public $name;
    public $ref;
    public $id;
    public $subsections = Array();
    public $position;

    function __construct($data = null)
    {
        if(is_array($data)){
                $this->name = $data['sectionName'] ?? null;
                $this->ref  = $data['ref'] ?? null;
                $this->id = $data['id'] ?? null;
                $this->position = $data['position'] ?? null;
        }
    }

    function setReference($ref)
    {
        $this->ref = $ref;
        return $this;
    }

    function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }    

}