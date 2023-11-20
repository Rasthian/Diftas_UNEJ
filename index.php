<?php
	require_once('config/conn.php');
	require_once('controller/diskusi.php');
    require_once('controller/login.php');



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
