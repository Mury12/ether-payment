<?php

namespace Controller;

use Entity\SynapsisEntity;
use Model\Synapsis;
require_once 'app/partials/classes/entities/SynapsisEntity.php';
require_once 'app/partials/classes/model/Synapsis.php';

class SynapsisController
{
    private $se;
    private $sm;
    function __construct($data)
    {
        $this->sm = new Synapsis($data);
        $this->se = new SynapsisEntity($this->sm);
    }

    function updateSynapsis()
    {
        return $this->se->updateSynapsis();
    }

    function getSynapsis()
    {
        return $this->se->getSynapsis();
    }
}