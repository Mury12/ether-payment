<?php

use Controller\SynapsisController;

require_once 'app/partials/classes/controller/SynapsisController.php';

$data = $_POST;
$exec = $data['exec'];
if($exec == 'get_synapsis'){
    $se = new SynapsisController($data);
    $r = $se->getSynapsis();
}
if($exec == 'update_section_content'){
    $se = new SynapsisController($data);
    $r = $se->updateSynapsis();
}

\sendJsonResponse($r);
