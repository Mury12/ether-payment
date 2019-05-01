<?php
/**
 * This document is used to put the global functions
 */
use Model\Section;
use Model\Subsection;
use Model\Page;
require_once 'app/partials/classes/model/Section.php';
require_once 'app/partials/classes/model/Subsection.php';
require_once 'app/partials/classes/model/Page.php';

$_loginEnabled = true;
$_loginSection = 'app/partials/pieces/login-section.php';

function getRootUri()
{
    return getenv('HTTP_HOST');
}

function is_page($slug)
{
    return substr($_SERVER['REQUEST_URI'],1) == $slug;
}

function is_home()
{
    return substr($_SERVER['REQUEST_URI'],1) == "" || substr($_SERVER['REQUEST_URI'],1) == 'home';
}

function makeAlert($message, $ttl=100)
{
    return print_r('<script>setTimeout(function(){simpleAlert.show({message:"'.$message.'", type:"danger"})},'.$ttl.')</script>');
}
function sendJsonResponse($message){
    header('Content-Type: application/json');
    print_r(json_encode($message));
}


function setLoginSection($file)
{
    $_loginSection = 'app/partials/pieces/'.$file.'.php';
    return $this;
}

function getLoginSection()
{
    global $_loginSection;
    return require_once($_loginSection);
}

function enableLogin($bool)
{
    $_loginEnabled = $bool;
    return $this;
}

function isLoginEnabled()
{
    global $_loginEnabled;
    return $_loginEnabled;
}

function makeArrayFromQuery($q, $cls = null, $map = false)
{
	$r = array();

    while ($ln = $q->fetch(PDO::FETCH_ASSOC)) {
		if ($cls == null && !$map) {
            $r[] = $ln;
        } elseif ($cls != null && $map) {
            $r[] = new $cls(array_map('utf8_encode',$ln));
        } else {
            $r[] = new $cls($ln);
        }
    }
    return $r;
}
function url_exists($url)
{
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}
function swapChars($string)
{
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}	

function getSessionMessage()
{
    if($_SESSION['message'] !== null && sizeof($_SESSION['message']) > 0){
        makeAlert($_SESSION['message'], 1000);
        unset($_SESSION['message']);
    }
}