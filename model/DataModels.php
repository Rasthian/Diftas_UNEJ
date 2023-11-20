<?php 

class DataModel 
{

    public static function createData($name, $nim, $email, $address)
    {
        global $conn;

        $sql = "INSERT INTO users(name, nim, email, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssss', $name, $nim, $email, $address);
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
        
        if(empty($err)){
            $_SESSION['session_nim'] = $nim; //server
            $_SESSION['session_password'] = md5($password);
            $cookie_name = "cookie_nim";
            $cookie_value = $nim;
            $cookie_time = time() + (60 * 60 * 24 * 30);
            setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            $cookie_name = "cookie_password";
            $cookie_value = md5($password);
            $cookie_time = time() + (60 * 60 * 24 * 30);
            setcookie($cookie_name,$cookie_value,$cookie_time,"/");
        }
        return $err;
    }
    public static function sessionData(){
        if(isset($_SESSION['session_nim'])){
            header("location:?action=homepage");
            exit();
        }
    }
    public static function sessionHomepage(){
        if(!isset($_SESSION['session_nim'])){
            header("location:?action=login");
            exit(); 
        }
    }
    public static function cookieData(){
        global $conn;
        if(isset($_COOKIE['cookie_nim'])){
            $cookie_nim = $_COOKIE['cookie_nim'];
            $cookie_password = $_COOKIE['cookie_password'];
        
            $sql1 = "select * from user where nim = '$cookie_nim'";
            $q1   = mysqli_query($conn,$sql1);
            $r1   = mysqli_fetch_array($q1);
            if($r1['password'] == $cookie_password){
                $_SESSION['session_nim'] = $cookie_nim;
                $_SESSION['session_password'] = $cookie_password;
            }
        }
    }
}