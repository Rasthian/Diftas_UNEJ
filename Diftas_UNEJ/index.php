<?php
require_once 'config/conn.php';
require_once 'config/config.php';
require_once 'controller/diskusiController.php';
require_once 'controller/authController.php';
require_once 'controller/profileController.php';
require_once 'controller/adminController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$diskusiController = new DiskusiController();
$authController = new authController();
$profileController = new profileController();
$adminController = new adminController();

switch ($action) {
    case 'deleteDiskusiAdmin':
        $id = $_GET['id'];
        $adminController->deletelaporan($id);
        break;
    case 'login':
        $authController->login();
        break;
    case 'showLaporan':
        $id = $_GET['id'];
        $diskusiController->showlaporan($id); 
        break;
    case 'showLaporanAdmin':
        $id = $_GET['id'];
        $adminController->showlaporan($id); 
        break;
    case 'deleteLaporanAdmin':
        $id = $_GET['id'];
        $adminController->deletelaporan($id); 
        break;
    case 'addLaporan':
        $id = $_GET['id'];
        $diskusiController->addlaporan($id); 
        break;
    case 'diskusiku':
        $diskusiController->diskusiku();
        break;
    case 'filter':
        $diskusiController->filterDiskusi();
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
    case 'profile':
        $profileController->index();
        break;
     case 'showdiskusi':
        $id = $_GET['id'];
        $diskusiController->showDiskusi($id);
        break;
    case 'addKomentar':
        $id = $_GET['id'];
        $diskusiController->addKomentar($id);
        break;
    case 'deleteDiskusi':
        $id = $_GET['id'];
        $diskusiController->deleteDiskusi($id);
        break;
    case 'showCommentRealTime':
        $id = $_GET['id'];
        $diskusiController->showCommentRealTime($id);
        break;
    case 'updateProfile':
        $profileController->updateProfile();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'forgotPassword':
        $profileController->forgotPassword();
        break;
    case 'deleteAccount':
        $profileController->deleteAccount();
        break;
    case 'adminPage':
        $adminController->index();
        break;
    default:
        $diskusiController->index();
        break;
}
?>
