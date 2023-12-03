<?php

require_once 'config/conn.php';
require_once 'function.php';
require_once 'model/profileUser.php'; // Sesuaikan dengan nama model yang benar

class ProfileController {
    public function index() {
        // Implement logic to retrieve user profile data
        session_start();
        auth::sessionProgram();
        auth::cookieData();
        
        // Retrieve user data based on session or any specific criteria
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
    
                
    
                // Update user profile
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
}


?>

