<?php
require_once 'config/config.php';
require_once 'controller/function.php';
require_once 'controller/sub-controller/discuss_controller.php';
require_once 'controller/sub-controller/login_controller.php';

abstract class Controller {
    abstract static function index ();


}