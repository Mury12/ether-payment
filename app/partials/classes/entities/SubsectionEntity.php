<?php

namespace Entity;

use Model\Subsection;

require_once('app/partials/classes/model/Subsection.php');

use \PDO;

class SubsectionEntity
{
    private $subsection;

    function __construct($data)
    {
        $this->subsection = $data;
    }

    function addSubsection($ref)
    {
        global $conn;

        $query = "INSERT INTO subsection (ref, ssTitle, ssContent) VALUES (?, ?, ?)";

        $q = $conn->prepare($query);
            $q->bindParam(1, $ref);
            $q->bindParam(2, $this->subsection['ssTitle']);
            $q->bindParam(3, $this->subsection['ssContent']);
        return $this->executeQuery($q);
    }

    function getSubsections($ref)
    {
        global $conn;

        $query = "SELECT * FROM subsection WHERE ref = ".$ref;

        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);
        
        if($q != false){
            $r = \makeArrayFromQuery($q, "Model\Subsection");
            return $r;
        }
        return false;
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

    function updateSubsectionTitle($ref, $title)
    {
        global $conn;

        $query = "UPDATE subsection SET ssTitle = '".$title."' WHERE id = ".$ref;

        $q = $conn->prepare($query);
        return $this->executeQuery($q);
    }

    function updateSubsectionContent($ref, $content)
    {
        global $conn;

        $query = "UPDATE subsection SET ssContent = '".$content."' WHERE id = ".$ref;

        $q = $conn->prepare($query);
        return $this->executeQuery($q);
    }


    function removeSubsection($ref)
    {
        global $conn;

        $query = 'DELETE FROM subsection WHERE id = '.$ref;

        $q = $conn->prepare($query);

        return $this->executeQuery($q);
    }
    
}