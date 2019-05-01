<?php

namespace Entity;

use Model\Section;

require_once('app/partials/classes/model/Section.php');

use \PDO;

class SectionEntity
{
    private $section;

    function __construct($data)
    {
        $this->section = $data;
    }

    function addSection($section)
    {
        global $conn;

        $query = 'INSERT INTO section (ref, sectionName) VALUES (?, ?)';
        $q = $conn->prepare($query);
            $q->bindParam(1, $section->ref);   
            $q->bindParam(2, $section->name);

            if($this->executeQuery($q)){
                $query = "SELECT id FROM section ORDER BY id DESC LIMIT 1";
                $q = $conn->prepare($query);

                if($this->executeQuery($q) && $q->rowCount()==1){
                    $ln = $q->fetch(PDO::FETCH_NUM)[0];
                    return $ln;
                }
            }
        return false;
    }

    function getSections($route)
    {
        global $conn;

        $ref = $this->getReferencePageId($route);

        $query = "SELECT * FROM section WHERE ref = ".$ref." ORDER BY position ASC ";
        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);
        
        if($q != false){
            $r = \makeArrayFromQuery($q, "Model\Section");
            return $r;
        }
        return false;
    }

    function getReferencePageId($ref)
    {
        global $conn;

        $query = 'SELECT id FROM page WHERE route = "'.$ref.'" LIMIT 1';
        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);

        if($q != false && $q->rowCount()>0){
            $r = $q->fetch(PDO::FETCH_NUM);
            return $r[0];
        }
        return false;
    }

    function removeSection()
    {
        global $conn;

        $query = "DELETE FROM section WHERE id = ".$this->section->id;

        $q = $conn->prepare($query);

        if($this->removeAllSubsections($this->section->id)){
            return $this->executeQuery($q);            
        }
        return false;
    }

    function removeAllSubsections()
    {
        global $conn;

        $query = "DELETE FROM subsection WHERE ref = ".$this->section->id;

        $q = $conn->prepare($query);

        return $this->executeQuery($q);
    }

    function executeQuery($q)
    {
        try{
            if($q->execute()) return $q;
        }catch(PDOExeption $e){
           echo $e->getMessage();
        }
        return false;
    }

    function updateSectionTitle($ref, $title)
    {
        global $conn;

        $query = 'UPDATE section SET sectionName = "'.$title.'" WHERE id ='.$ref;
        $q = $conn->prepare($query);
        return $this->executeQuery($q);
    }

    function swapSections($sec1, $sec2)
    {
        global $conn;

        $query = "UPDATE section SET position = ? WHERE id = ?";

        $q = $conn->prepare($query);
            $q->bindParam(1, $sec1->position);
            $q->bindParam(2, $sec1->id);


        if($this->executeQuery($q)){
            $query = ' UPDATE section SET position = ? WHERE id = ?';
            
            $q = $conn->prepare($query);
                $q->bindParam(1, $sec2->position);
                $q->bindParam(2, $sec2->id);
                return $this->executeQuery($q);
        }
        return false;

    }
}