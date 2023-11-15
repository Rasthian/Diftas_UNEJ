<?php
require_once 'controller/controllers.php';

class LoginController extends Controller {
    static function index(){
        view('auth/login');
    }
    
}
?>