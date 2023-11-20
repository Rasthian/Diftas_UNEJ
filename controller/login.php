<?php
require_once 'config/conn.php';
require_once 'function.php';
require_once('Model/DataModels.php');
class LoginController {
    public function index() {
        view('auth/login');
    }
    public function login() 
    {
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        DataModel::sessionData();
        $nim   = $_POST['nim'];
        $password   = $_POST['password'];
        if(empty($nim) and empty($password)){
            $err="<li style='list-style-type: none;' >tolong masukkan nim dan password anda.</li>";
            include ('view/auth/login.php');
        } else {
            $err = DataModel::loginData($nim,$password);
            if($err == ''){
                header("location:?action=homepage");
            } else {
                include ('view/auth/login.php');
            }
        }
    }
    public function logout() {
        view('auth/logout');
    }
    public function register() {
        view('auth/register');
    }
    
}
?>