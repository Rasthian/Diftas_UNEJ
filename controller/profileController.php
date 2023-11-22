<?php
require_once 'config/conn.php';
require_once 'function.php';

class ProfileController {
    public function index () {
        view('profile/profile');
    }

}
?>