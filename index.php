<?php
	require_once('config/conn.php');
	require_once('controller/diskusi.php');
    require_once('controller/login.php');
	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
	$diskusiController = new DiskusiController();
    $loginController = new LoginController();
	switch ($action) {
        case 'login':
            $loginController->login();  
            break;
		case 'logout':
			$loginController->logout();
			break;
		case 'register':
			$loginController->register();
			break;
		case 'homepage':
			$diskusiController->index();
			break;
		default:
			$loginController->index();
            break;
	}
?>
