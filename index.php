<?php
require_once 'config/conn.php';
require_once 'config/config.php';
require_once 'controller/diskusiController.php';
require_once 'controller/authController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$diskusiController = new DiskusiController();
$authController = new authController();

// Memanggil action yang sesuai
switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'add-diskusi':
        $diskusiController->add();
        break;
    case 'register':
        $authController->register();
        break;
    case 'registerProcess':
        $authController->registerProcess();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        $diskusiController->index();
        break;
}
?>
