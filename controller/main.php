<?php
require_once 'controller/controllers.php';
require_once 'controller/function.php';
require_once 'config/config.php';

$url = $_GET['url'] ?? '/Diftas_UNEJ/';
switch ($url) {
    default:
    DiscussController::index();
}
?>