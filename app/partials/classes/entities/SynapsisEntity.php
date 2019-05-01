<?php

namespace Entity;

use Model\Synapsis;

require_once 'app/partials/classes/model/Synapsis.php';

use \PDO;

class SynapsisEntity
{
    private $sm;

    function __construct($request)
    {
        $this->sm = $request;
    }

    function updateSynapsis()
    {
        global $conn;

        $query = 'UPDATE synapsis SET content = ? WHERE id = ?';
        
        $q = $conn->prepare($query);
        $q->bindParam(1, $this->sm->content);
        $q->bindParam(2, $this->sm->id);

        if($this->executeQuery($q) != false) return ["res"=>true];
        return ["erro"=>true];
        
    }


    function getSynapsis()
    {
        global $conn;

        $query = 'SELECT * FROM synapsis ORDER BY id ASC';
        
        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);

        if($q != false && $q->rowCount()>0){
            $r = \makeArrayFromQuery($q, "Model\Synapsis");
            return $r;
        }
        return [];
    }

    function executeQuery($q)
    {
        try{
            if($q->execute()) return $q;
        }catch(PDOExeption $e){
            print_r($e->getMessage());
        }
        return false;
    }
}