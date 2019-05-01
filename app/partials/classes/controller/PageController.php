<?php

namespace Controller;

use Entity\PageEntity;
use Model\Page;

require_once 'app/partials/classes/model/Page.php';
require_once 'app/partials/classes/entities/PageEntity.php';

class PageController
{
    private $pg;
    private $pe;

    public function __construct($request = null)
    {
        $this->pg = new Page($request);
        $this->pe = new PageEntity($this->pg);
    }

    public function addPage()
    {
        return $this->pe->addPage();
    }

    public function addSection($section)
    {
        return $this->pe->addSection($section);
    }

    public function addSubsection($subsection)
    {
        return $this->pe->addSubsection($subsection);
    }

    public function addMenuItem($menuitem)
    {
        return $this->pe->addMenuItem($menuitem);
    }

    public function getPage($route)
    {
        return $this->pe->getPage($route);
    }

    public function getPages()
    {
        return $this->pe->getPages();
    }

    public function getSections($ref)
    {
        return $this->pe->getSections($ref);
    }

    public function getSubsection($ref)
    {
        return $this->pe->getSubsection($ref);
    }

    public function getMenuItems($ref)
    {
        return $this->pe->getMenuItems($ref);
    }
    
    public function updateHeaderTitle($ref, $title)
    {
        return $this->pe->updateHeaderTitle($ref, $title);
    }
    
    public function updateHeaderSubtitle($ref, $subtitle)
    {
        return $this->pe->updateHeaderSubtitle($ref, $subtitle);
    }

    public function getRoutes()
    {
        return $this->pe->getRoutes();
    }

}
