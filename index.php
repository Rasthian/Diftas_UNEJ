<?php
	require_once('config/conn.php');
	require_once('controller/diskusi.php');
    require_once('controller/login.php');

<<<<<<< HEAD
<<<<<<< HEAD
	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
=======
$action = isset($_GET['action']) ? $_GET['action'] : '';
>>>>>>> 059c445546dfd42cee99b2a98ad7f327e6e45fd2
=======
$action = isset($_GET['action']) ? $_GET['action'] : '';
>>>>>>> 059c445546dfd42cee99b2a98ad7f327e6e45fd2

	$diskusiController = new DiskusiController();
    $loginController = new LoginController();

<<<<<<< HEAD
<<<<<<< HEAD

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
=======
=======
>>>>>>> 059c445546dfd42cee99b2a98ad7f327e6e45fd2
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
>>>>>>> 059c445546dfd42cee99b2a98ad7f327e6e45fd2
