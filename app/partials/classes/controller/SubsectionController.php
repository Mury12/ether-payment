<?php

namespace Controller;

use Entity\SubsectionEntity;
use Model\Subsection;

require_once 'app/partials/classes/model/Subsection.php';
require_once 'app/partials/classes/entities/SubsectionEntity.php';

class SubsectionController
{
    public $ss;
    public $se;

    function __construct($request = null)
    {
        $this->ss = new Subsection($request);
        $this->se = new SubsectionEntity($request);
    }

    function addSubsection($ref)
    {
        return $this->se->addSubsection($ref, $this->ss);
    }

    function removeSubsection($ref)
    {
        return $this->se->removeSubsection($ref);
    }
    
    function getSubsections()
    {
        return $this->se->getSubsections($this->ss->ref);
    }

    function updateSubsectionTitle($ref, $title)
    {
        return $this->se->updateSubsectionTitle($ref, $title);
    }

    function updateSubsectionContent($ref, $content)
    {
        return $this->se->updateSubsectionContent($ref, $content);
    }
}