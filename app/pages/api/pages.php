<?php
use Controller\PageController;
use Controller\SectionController;
use Controller\SubsectionController;
require_once 'app/partials/classes/controller/PageController.php';
require_once 'app/partials/classes/controller/SectionController.php';
require_once 'app/partials/classes/controller/SubsectionController.php';

$data = $_POST;
extract($data);
$r = array();
if ($exec == 'get_page') {
    $p = new PageController();
    $r[] = $p->getPage($route);
}

if ($exec == 'get_sections') {
    $s = new SectionController($routeName);
    $_r = $s->getSections();

    if (is_array($_r)) {
        foreach ($_r as $section) {
            $ss = new SubsectionController(['ref' => $section->id]);
            $section->subsections = $ss->getSubsections();
            $r[] = $section;
        }
    }else{
        $r = [];
    }
}

if(\array_key_exists(hash('sha256', 'auth'), $_SESSION) && $_SESSION[hash('sha256', 'auth')]){
    if ($exec == 'update_header_title') {
        $p = new PageController();
        if ($p->updateHeaderTitle($id, $title)) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }
    if ($exec == 'update_header_subtitle') {
        $p = new PageController();
        if ($p->updateHeaderSubtitle($id, $subtitle)) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }
    if ($exec == 'update_header_title') {
        $p = new PageController();
        $r[] = $p->updateHeaderTitle($id, $title);
    }

    if ($exec == 'remove_section') {
        $s = new SectionController(['id' => $ref]);
        if ($s->removeSection()) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }

    if ($exec == 'update_section_name') {
        $s = new SectionController();
        if ($s->updateSectionTitle($id, $title)) {
            $r = array('res' => 'true');
        }
    }

    if ($exec == 'add_new_section') {
        $s = new SectionController($data);
        $ss = new SubsectionController($data['subsections'][0]);
        extract($data['subsections'][0]);
        if ($ss->addSubsection($s->addSection())) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }

    if ($exec == "add_new_subsection") {
        $ss = new SubsectionController($data);
        if ($ss->addSubsection($data['ref'])) {
            $r = array('res' => true);
        } else {
            $r = array('erro' => true);
        }
    }

    if ($exec == 'remove_subsection') {
        $ss = new SubsectionController();
        if ($ss->removeSubsection($ref)) {
            $r = array('res' => true);
        }
    }

    if ($exec == 'update_subsection_title') {
        $s = new SubsectionController();
        if ($s->updateSubsectionTitle($id, $title)) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }
    if ($exec == 'update_subsection_content') {
        $s = new SubsectionController();
        if ($s->updateSubsectionContent($id, $content)) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }

    if ($exec == 'swap_sections_position') {
        $s = new SectionController();

        $s->includeSection($sections[0]);
        $s->includeSection($sections[1]);

        if ($s->swapSections()) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }

    if ($exec == 'request_pages') {
        $p = new PageController();
        $r = $p->getPages();
    }

    if ($exec == 'create_page') {
        $p = new PageController($page);
        if ($p->addPage()) {
            $r = array('res' => 'true');
        } else {
            $r = array('erro' => 'true');
        }
    }

} else if(sizeof($r) == 0){
    sendJsonResponse(['erro'=>'Amigo, você não pode acessar este recurso "'.$exec.'" ou parâmetro incorreto.']);
    return false;
}
    sendJsonResponse($r);
