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
    public static function sessionProgram(){
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
    public static function getAllProdi(){
        global $conn;
        $query = "SELECT id,nama FROM prodi";
        $result = mysqli_query($conn, $query);
        return $result;
    }
}