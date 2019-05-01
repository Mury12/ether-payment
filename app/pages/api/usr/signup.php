<?php
use Controller\User\UserController;
require_once('app/partials/classes/controller/UserController.php');
$u = new UserController($_POST);
$u->signUp();
