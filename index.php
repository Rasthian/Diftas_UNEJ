<?php
require_once 'config/conn.php';
require_once 'config/config.php';
require_once 'controller/diskusi.php';
require_once 'controller/login.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$diskusiController = new DiskusiController();
$loginController = new LoginController();

// Memanggil action yang sesuai
switch ($action) {
    case 'login':
        $loginController->index();
        break;
    case 'add-diskusi':
        $diskusiController->add();
        break;
    default:
        $diskusiController->index();
        break;
}
?>
