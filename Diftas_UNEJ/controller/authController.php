<?php
require_once 'config/conn.php';
require_once 'config/config.php';
require_once 'function.php';
require_once('Model/authModels.php');
class authController {
    public function index() {
        
        view('auth/login');
    }
    public function login() 
    {
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        auth::sessionData();
        $nim   = $_POST['nim'];
        $password   = $_POST['password'];
        if(empty($nim) or empty($password)){
            $err="<li style='list-style-type: none;' >tolong masukkan nim dan password anda.</li>";
            include ('view/auth/login.php');
        } else {
            $err = auth::loginData($nim,$password);
            if($err == '' and $_SESSION['stat_admin'] == true){
                header("location:?action=adminPage");
            } elseif($err == '' and $_SESSION['stat_admin'] == false){
                header("location: " .BASEURL);
            }
            else {
                include ('view/auth/login.php');
            }
        }
    }
    public function logout() {
        view('auth/logout');
    }
    public function register(){
        $result = auth::getAllProdi();
        include ('view/auth/register.php');
    }
    public function registerProcess() {
        
        $nama = $_POST['nama'];
        $nim = $_POST['NIM'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conpassword = $_POST['confirmasiPassword'];
        $prodi = $_POST['prodi'];
        $err = '';
        if(empty($nama) or empty($nim) or empty($email) or empty($password) or empty($prodi))
        {
            $err = "<li style='list-style-type: none;' >tolong masukkan biodata anda dengan lengkap .</li>";
            $result = auth::getAllProdi();
            include ('view/auth/register.php');
            exit;
        }elseif($password != $conpassword){
            $err = "<li style='list-style-type: none;' >masukkan Confirmasi-Password yang tepat .</li>";
            $result = auth::getAllProdi();
            include ('view/auth/register.php');
            exit;
        }
        $err = auth::cekData($nim,$email);
        if(empty($err)){
            auth::createData($nama, $nim, $email, $password, $prodi);
            header('location: ?action=login');
        } else {
            $err;
            $result = auth::getAllProdi();
            include ('view/auth/register.php');
        }
    }
    
}
?>