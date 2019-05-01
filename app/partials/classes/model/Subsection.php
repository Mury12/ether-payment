<?php

namespace Model;

class Subsection
{
    public $name;
    public $title;
    public $content;
    public $ref;
    public $id;

    function __construct($data = null)
    {
        if(is_array($data)){
                $this->title= $data['ssTitle'] ?? null;
                $this->content = $data['ssContent'] ?? null;
                $this->ref = $data['ref'] ?? null;
                $this->id = $data['id'] ?? null;
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

    function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    

}