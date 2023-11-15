<?php
require_once 'config/config.php';
require_once 'controller/function.php';
require_once 'controller/discuss_controller.php';

abstract class Controller {
    abstract static function index ();
}