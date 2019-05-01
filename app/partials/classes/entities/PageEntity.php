<?php

namespace Entity;

use Model\Page;

require_once('app/partials/classes/model/Page.php');

use \PDO;

class PageEntity
{
    private $page;

    public function __construct($page = null)
    {
        $this->page = $page;
    }

    function addPage()
    {
        global $conn;

        $query = "INSERT INTO page (title, subtitle, route, menufile) VALUES (?, ?, ?, ?)";

        $q = $conn->prepare($query);
            $q->bindParam(1, $this->page->title);
            $q->bindParam(2, $this->page->subtitle);
            $q->bindParam(3, $this->page->route);
            $q->bindParam(4, $this->page->menufile);

        return $this->executeQuery($q);
    }

    function addMenuItem($menuitem)
    {
        global $conn;

        $query = "INSERT INTO menu (ref, itemName) VALUE (?, ?)";

        $q = $conn->prepare($query);
            $q->bindParam(1, $menuitem->ref);
            $q->bindParam(2, $menuitem->itemName);

        return $this->executeQuery($q);
    }

    function getPage($route)
    {
        global $conn;

        $query = "SELECT * FROM page WHERE route = '".$route."' LIMIT 1";

        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);

        if($q != false && $q->rowCount()>0){
            $r = $q->fetch(PDO::FETCH_ASSOC);
            $this->page->title = $r['title'];
            $this->page->subtitle = $r['subtitle'];
            $this->page->route = $r['route'];
            $this->page->menufile = $r['menufile'];
            $this->page->id = $r['id'];
            
            return $this->page;
        }
        return false;
    }

    function getPages()
    {
        global $conn;

        $query = "SELECT * FROM page ORDER BY route DESC";

        $q = $conn->prepare($query);

        $q = $this->executeQuery($q);

        if($q != false){
            $r = \makeArrayFromQuery($q, 'Model\Page');
            return $r;
        }
        return false;
    }

    
    function getMenuItems($ref)
    {
        global $conn;
        
        $query = "SELECT * FROM menu WHERE ref = ".$ref;

        $q = $conn->prepare($query);
        $q = $this->executeQuery($q);

        if($q != false){
            $r = \makeArrayFromQuery($q, "Model\MenuItem");
            return $r;
        }
        return false;
    }

    function getRoutes()
    {
        global $conn;

        $query = "SELECT DISTINCT(route) FROM page";

        try {
            $q = $conn->prepare($query);
            $q = $this->executeQuery($q);
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
        
        if($q != false && $q->rowCount()>0){
            $r = \makeArrayFromQuery($q);
            return $r;
        }
        return false;
    }

    function updateHeaderTitle($ref, $title)
    {
        global $conn;

        $query = 'UPDATE page SET title = "'.$title.'" WHERE id = '.$ref;

        $q = $conn->prepare($query);
        return $this->executeQuery($q);
    }
    function updateHeaderSubtitle($ref, $subtitle)
    {
        global $conn;

        $query = 'UPDATE page SET subtitle = "'.$subtitle.'" WHERE id = '.$ref;

        $q = $conn->prepare($query);
        return $this->executeQuery($q);
    }

    function executeQuery($q)
    {
        try{
            if($q->execute()) return $q;
        }catch(PDOExeption $e){
            $e->getMessage();
        }
        return false;
    }

}