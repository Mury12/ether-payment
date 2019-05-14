<?php

use Controller\User\UserController;
require_once('app/partials/classes/controller/UserController.php');

$data = array_map('addslashes', $_POST);
global $_s;
if($data['exec'] == 'update_wallet'){
    $w = $data['wallet'];
    $uid = $_s->getSessionValue('uid');

    $u = new UserController();
    $u->addUserEthWallet($uid, $w);
}