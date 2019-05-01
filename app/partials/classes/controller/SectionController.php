<?php

namespace Controller;

use Entity\SectionEntity;
use Model\Section;

require_once 'app/partials/classes/model/Section.php';
require_once 'app/partials/classes/entities/SectionEntity.php';

class SectionController
{
    private $sc;
    private $se;
    private $route;

    function __construct($request = null)
    {
        $this->sc = new Section($request);
        $this->se = new SectionEntity($this->sc);
        $this->route = $request;
    }

    function includeSection($section)
    {
        if(!is_array($this->sc)){
            $a = $this->sc;
            $this->sc = null;
        }
        $this->sc[] = new Section($section);
    }
    function addSection()
    {
        return $this->se->addSection($this->sc);
    }

    function getSections()
    {
        return $this->se->getSections($this->route);
    }

    function getReference()
    {
        return $this->sc->ref;
    }

    function getSectionName()
    {
        return $this->sc->name;
    }

    function removeSection()
    {
        return $this->se->removeSection($this->sc);
    }

    function updateSectionTitle($title, $ref)
    {
        return $this->se->updateSectionTitle($title, $ref);
    }

    function swapSections()
    {
       return $this->se->swapSections($this->sc[0], $this->sc[1]);
    }
}