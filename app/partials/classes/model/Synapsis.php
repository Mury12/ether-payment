<?php

namespace Model;

class Synapsis
{
    public $id;
    public $content;

    function __construct($data)
    {
            $this->content = $data['content'] ?? null;
            $this->id = $data['id'] ?? null;
    }

    
}