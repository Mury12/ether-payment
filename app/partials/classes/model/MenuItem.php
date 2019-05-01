<?php

namespace Model;

class MenuItem
{
    public $itemName;
    public $link;
    private $ref;

    function __construct($data = null)
    {
        if($data != null){
            extrac($data);
            $this->itemName = $itemName;
            $this->link     = $link;
            $this->ref      = $ref;
        }
    }

}