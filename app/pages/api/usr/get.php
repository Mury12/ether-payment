<?php

use Controller\User\UserController;
require_once('app/partials/classes/controller/UserController.php');

$data = array_map('addslashes', $_POST);
global $_s;
if($data['exec'] == 'get_usr_wallet'){
    $u = new UserController();
    $uid = $_s->getSessionValue('uid');
    $u->getUserWallet($uid);
}