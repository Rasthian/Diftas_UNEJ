<?php
require_once 'config/conn.php';
require_once 'config/config.php';
require_once 'controller/diskusi.php';
require_once 'controller/login.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$diskusiController = new DiskusiController();
$loginController = new LoginController();

switch ($action) {
    case 'login':
        $loginController->index();
        break;  // Pastikan untuk menambahkan break di sini

    default:
        $diskusiController->index();
        break;  // Dan juga di sini
}
?>
