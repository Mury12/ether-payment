<?php

namespace Model;



class Page
{
    public $title;
    public $subtitle;
    public $route;
    public $menufile;
    public $id;

    function __construct($data = null)
    {
        if(\is_array($data)){
            
            $this->route = $data['route'] ?? null;
            $this->title = $data['title'] ?? null;
            $this->subtitle = $data['subtitle'] ?? null;
            $this->menufile = $data['menufile'] ?? null;
            $this->id = $data['id'] ?? null;

        }   
    }

    function getTitle()
    {
        return $this->title;
    }

    function getSubtitle()
    {
        return $this->subtitle;
    }

    function getRoute()
    {
        return $this->route;
    }

    function getMenufile()
    {
        return $this->menufile;
    }

}