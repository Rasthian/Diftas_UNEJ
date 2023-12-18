<?php

require_once 'config/conn.php';
require_once 'function.php';
require_once 'model/profileUser.php';

class ProfileController {
    public function index() {
        // Implement logic to retrieve user profile data
        session_start();
        auth::sessionProgram();
        auth::cookieData();
        
        $userModel = new ProfileUser(); // Create instance of ProfileUser
        $userData = $userModel->getUserById($_SESSION['session_id']); // Assuming session id is used
        
        // Pass user data to the profile view
        include('view/profile/profile.php');
    }

    public function updateProfile() {
        session_start();
        auth::sessionProgram();
        auth::cookieData();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['session_id'])) {
            $userModel = new ProfileUser();
            $userData = $userModel->getUserById($_SESSION['session_id']);
            if (isset($userData)) {
                $id = $_SESSION['session_id'];
                $nama = $_POST['nama']; 
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                $result = $userModel->updateUserProfile($id, $nama, $email, $password);
    
                if ($result) {
                    header('Location: ?action=profile');
                    exit();
                } else {
                    echo "Failed to update profile.";
                }
            }
        }
    } 
    
    public static function forgotPassword () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
            $email = $_POST['email'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            $user = ProfileUser::getUserByEmail($email);
            if (!$user) {
                $error = "Email tidak terdaftar";
            } elseif ($newPassword !== $confirmPassword) {
                $error = "Password tidak cocok";
            } else {
                ProfileUser::updatePassword($user['id'], $newPassword);    
                header("Location: ?action=login");
                exit();
            }
        }
        include('view/Auth/forgotpassword.php');
    }
    public function deleteAccount() {
        session_start();
        auth::sessionProgram();
        auth::cookieData();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['session_id'])) {
            $userModel = new ProfileUser();
            $id = $_SESSION['session_id'];

            $result = $userModel->deleteAccount($id);

            if ($result) {
                session_destroy();
                $_SESSION['notification'] = "Akun berhasil dihapus";
                header('Location: ?action=logout');
                exit();
            } else {
                echo "Gagal menghapus akun";
            }
        } else {
            header('Location: ' . BASEURL . '?action=profile');
            exit();
        }
    } 
}

?>

