<?php

use Model\Layout; 
use Controller\PageController;

require_once 'partials/classes/model/Layout.php';
require_once 'app/partials/classes/controller/PageController.php';

function setRoutes(){
    $p = new PageController();

    $_routes = array_values($p->getRoutes());
    $_r = Array();
        foreach($_routes as $r){
            extract($r);
            $l = new Layout();
            $page = $p->getPage($route);
            $l = new Layout();
            $l->appendTitle($page->title, " - ")
                    ->setHeader('dynamic-header-vue')
                    ->setPage('dynamic-page-vue')
                    ->setHeaderTitle($page->title)
                    ->setHeaderSubTitle($page->subtitle)
                    ->setRouteName($route)
                    ->addJs('dynamic-pages')
                    ->addCss('dynamic-page');
            $_r[$route] = $l;
        }
    return $_r;
};

return setRoutes();