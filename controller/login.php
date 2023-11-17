<?php
require_once 'config/conn.php';
require_once 'function.php';

class LoginController {
    public function index() {
        view('auth/login');
    }
    
}
?>