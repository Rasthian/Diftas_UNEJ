<?php 

class auth
{
    public static function cekData( $nim, $email){
        global $conn;
        $sql1 = "select * from user where nim = '$nim' or email = '$email'" ;
        $q1   = $conn->query($sql1);
        $r1   = mysqli_fetch_array($q1);
        $err  = '';
        if( $r1['nim'] != '' and $r1['email'] != ''){
            $err .= " <li style='list-style-type: none; color: red;' >nim atau email sudah tersedia.</li> ";
        }
        return $err;
    }
    public static function createData($nama, $nim, $email, $password, $prodi)
    {
        global $conn;
        $hashedPassword = md5($password);
        $sql = "INSERT INTO user(nama, nim, email, password, prodi_fk) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi', $nama, $nim, $email, $hashedPassword, $prodi);
        $stmt->execute();
    }

    public static function loginData($nim,$password){
        global $conn;
        $sql1 = "select * from user where nim = '$nim'";
        $q1   = $conn->query($sql1);
        $r1   = mysqli_fetch_array($q1);
        $err  = '';

        if($r1['nim'] == ''){
            $err = " <li style='list-style-type: none; color: red;' >nim tidak tersedia.</li> ";
            return $err; 
            exit;
        }elseif($r1['password'] != md5($password)){
            $err = "<li style='list-style-type: none; color: red;' >Password yang dimasukkan tidak sesuai.</li>";
            return $err;
            exit;
        }       
        $id = $r1['id'];
        $stat = $r1['stat_admin'];
        if(empty($err)){
            $_SESSION['session_id'] = $id; //server
            $_SESSION['session_password'] = md5($password);
            $_SESSION['stat_admin'] = $stat;
            $cookie_name = "cookie_user";
            $cookie_value = $id;
            $cookie_stat_admin = $stat;
            $cookie_time = time() + (60 * 60 * 24 * 30);
            setcookie($cookie_name,$cookie_value,$cookie_stat_admin,$cookie_time,"/");
            $cookie_name = "cookie_password";
            $cookie_value = md5($password);
            $cookie_stat_admin = $_COOKIE['cookie_stat_admin'];
            $cookie_time = time() + (60 * 60 * 24 * 30);
            setcookie($cookie_name,$cookie_value,$cookie_stat_admin,$cookie_time,"/");
        }
        return $err;
    }

    public static function sessionData(){
        if(isset($_SESSION['session_id'])){
            header("location:?action=homepage");
            exit();
        }
    }
    public static function sessionAdmin(){
        if($_SESSION['stat_admin']==false){
            header("location:?action=homepage");
            exit(); 
        } 
    }
    public static function sessionProgram(){
        if(!isset($_SESSION['session_id'])){
            header("location:?action=login");
            exit(); 
        }
    }
     public static function cookieData(){
        global $conn;
        if(isset($_COOKIE['cookie_user'])){
            $cookie_user = $_COOKIE['cookie_user'];
            $cookie_password = $_COOKIE['cookie_password'];
            $cookie_stat_admin = $_COOKIE['cookie_stat_admin'];
            $sql1 = "select * from user where id = '$cookie_user'";
            $q1   = mysqli_query($conn,$sql1);
            $r1   = mysqli_fetch_array($q1);
            if($r1['password'] == $cookie_password){
                $_SESSION['session_id'] = $cookie_user;
                $_SESSION['session_password'] = $cookie_password;
                $_SESSION['stat_admin'] = $cookie_stat_admin;
            }
        }
    }
    public static function getAllProdi(){
        global $conn;
        $query = "SELECT id,nama FROM prodi";
        $result = mysqli_query($conn, $query);
        return $result;
    }
}